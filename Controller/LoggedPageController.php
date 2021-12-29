<?php

namespace Controller;

abstract class LoggedPageController extends Controller {

    function __construct() {
        if(!(new \Services\Auth)->validateLogin()) {
			$this->redirect('auth/login', );
		}
    }

}