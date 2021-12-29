<?php

namespace Services;

use Dao\User;
use stdClass;

class Auth {

    function __construct() {
        if(session_id() == '') {
			session_start();
		}
    }
    
    function login(string $username, string $password) {
        $user = new stdClass();
        $user->username = $username;
        $user->password = md5($password);
        $_SESSION['user'] = $user;
    }

    function isLogged() : bool {
        return isset($_SESSION['user']);
    }

    function validateLogin() : bool {
        if(!$this->isLogged()) {
            return false;
        }
        $user = $_SESSION['user'];
        return (new User)->validateUserInfo($user->username, $user->password, true);
    }

    function logout() {
		session_destroy();
    }

}