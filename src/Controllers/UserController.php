<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Models\UserDAO;
use App\Utils\SEOManager;
use App\Utils\UploadFile;
use App\Utils\View;
use App\Validators\FileValidators;
use App\Validators\UserValidator;

class UserController {
    private string $userImagesFolder = "users";
    private $seo;

    public function __construct() {
        $this->seo = new SEOManager;
    }

    /**
     * @return View "publicView/user/userPanel.php"
     */
    public function panelView(Request $request, $params) {
        $this->seo->setTitle(USER_PANEL);

        $user = getLoggedUser();
        $userImg = empty($user->getPhoto()) ? PATH_DEFAULT_USER_IMAGE : PATH_UPLOADS_USERS . $user->getPhoto() . "?v=" . time();

        View::render("publicView/user/userPanel.php", [
            "user" => $user,
            "userImg" => $userImg,
            "seo" => $this->seo
        ]);
    }

    /**
     * @return View "publicView/user/profile.php"
     */
    public function profileView(Request $request, $params) {
        $this->seo->setTitle(USER_PROFILE);

        $user = getLoggedUser();
        $userImg = empty($user->getPhoto()) ? PATH_DEFAULT_USER_IMAGE : PATH_UPLOADS_USERS . $user->getPhoto() . "?v=" . time();

        View::render("publicView/user/profile.php", [
            "user" => $user,
            "userImg" => $userImg,
            "seo" => $this->seo
        ]);
    }

    public function update(Request $request, $params) {
        try {
            $body = $request->body();
            $user = $request->getAttribute('userRequest');

            $fieldsValid = UserValidator::update($body);

            if(!$fieldsValid['isValid']) {
                return redirectWithMessage(PATH_USER_PROFILE, "error", $fieldsValid['message']);
            }

            $emailExists = UserDAO::fetchByEmail($body['email']);

            if($emailExists && $emailExists['id'] != $user->getId()) {
                return redirectWithMessage(PATH_USER_PROFILE, "error", EMAIL_IN_USE);
            }

            $user->update($body);
            $user->save();
            
            setUserLogged($user);

            return redirectWithMessage(PATH_USER_PROFILE, "success", USER_UPDATE);

        } catch (\Exception $e) {
            logError($e->getMessage());
            redirectWithMessage(PATH_USER_PROFILE, "error", FATAL_ERROR);
        }
    }

    public function updatePassword(Request $request, $params) {
        try {
            $body = $request->body();
            $user = $request->getAttribute('userRequest');

            if($body['newPassword'] != $body['confirmPassword']) {
                return redirectWithMessage(PATH_USER_PROFILE, "error", PASSWORDS_NOT_MATCH);
            }

            if(!password_verify($body['currentPassword'], $user->getPassword())) {
                return redirectWithMessage(PATH_USER_PROFILE, "error", PASSWORD_INCORRECT);
            }

            $user->setPassword($body['newPassword']);
            $user->save();

            return redirectWithMessage(PATH_USER_PROFILE, "success", PASSWORD_UPDATE);

        } catch (\Exception $e) {
            logError($e->getMessage());
            redirectWithMessage(PATH_USER_PROFILE, "error", FATAL_ERROR);
        }
    }

    public function updateAddress(Request $request, $params) {
        try {
            $body = $request->body();
            $user = $request->getAttribute('userRequest');

            $fieldsValid = UserValidator::update($body);

            if(!$fieldsValid['isValid']) {
                return redirectWithMessage(PATH_USER_PROFILE, "error", $fieldsValid['message']);
            }

            $user->update($body);
            $user->save();

            setUserLogged($user);

            return redirectWithMessage(PATH_USER_PROFILE, "success", ADDRESS_UPDATE);

        } catch (\Exception $e) {
            logError($e->getMessage());
            redirectWithMessage(PATH_USER_PROFILE, "error", FATAL_ERROR);
        }
    }

    /**
     * Change user image
     *
     * @param File photo
     * @return Response
     */
    public function updateImage(Request $request, $params) {
        try {
            $files = $request->files();

            if(!isset($files['photo']) || empty($files['photo'])) {
                return Response::json([
                    'message' => NOT_IMAGES_SENT
                ], 400);
            }

            $user = $request->getAttribute('userRequest');

            $fileData = FileValidators::validImage($files['photo']);

            if(isset($fileData['invalid'])) {
                return Response::json([
                    'message' => $fileData['invalid']
                ], 400);
            }

            if(!empty($user->getPhoto())) {
                UploadFile::removeFile($user->getPhoto(), $this->userImagesFolder);
            }

            $fileName = $user->getId() . "_user." . $fileData['mimeType'];
            UploadFile::uploadFile($files['photo'], $this->userImagesFolder, $fileName);

            $user->setPhoto($fileName);
            $user->save();

            // Updates user data in session
            setUserLogged($user);

            return Response::json([
                "message" => UPDATED_IMAGE_USER,
            ], 201);

        } catch (\Exception $e) {
            logError($e->getMessage());
            return Response::json([
                "message" => FATAL_ERROR
            ], 500);
        }
    }
}
