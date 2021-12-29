<?php

namespace Controller;

use Dao\User;

class Auth extends Controller {
    
    function login() {
        $auth = new \Services\Auth();
        $wasLogged = $auth->isLogged();
        $auth->logout();

        $this->view('login', [
            'wasLogged' => $wasLogged
        ]);
    }

    function validateLogin() {
        if((new User)->validateUserInfo($_POST['username'], $_POST['password'])) {
            (new \Services\Auth)->login($_POST['username'], $_POST['password']);
            $this->redirect('home/index');
        } else {
            $this->redirect('auth/login', [
                'i' => '1'
            ]);
        }
    }

}