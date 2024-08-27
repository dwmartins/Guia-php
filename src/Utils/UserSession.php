<?php

use App\Class\User;

/**
 * Gets the logged in user as an instance of the User class.
 * 
 * @return User|null
 */
function getLoggedUser() {
    if(isset($_SESSION['userLogged'])) {
        return new User($_SESSION['userLogged']);
    }

    return null;
}

/**
 * Checks if a user is currently logged in.
 * 
 * @return bool
 */
function isLoggedIn() {
    return isset($_SESSION['userLogged']);
}

/**
 * Checks if the logged in user has administrative privileges.
 * 
 * @return bool
 */
function isAdmin() {
    $allowedRoles = ["support", "admin", "mod", "test"];

    if(isLoggedIn()) {
        $user = getLoggedUser();
        return in_array($user->getRole(), $allowedRoles);
    }

    return false;
}

function setUserLogged(User $user) {
    $_SESSION['userLogged'] = $user->toArray();
}