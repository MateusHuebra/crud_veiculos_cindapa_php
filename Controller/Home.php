<?php

namespace Controller;

use Dao\Vehicle;

class Home extends LoggedPageController {

    function index() {
        $vehicles = (new Vehicle)->get();
        //echo '<pre>';
        //var_dump($vehicles);
        $this->view('home', [
            'vehicles' => $vehicles
        ]);
    }

}