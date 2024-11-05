<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Models\SettingsDAO;

class SettingsController {
    /**
     * @return Response
     */
    public function fetchByName(Request $request, $params) {
        try {
            $body = $request->body();

            Response::json(SettingsDAO::fetchByName($body['name']));
        } catch (\Exception $e) {
            logError($e->getMessage());
            return Response::json([
                "message" => FATAL_ERROR
            ], 500);
        }
    }
}