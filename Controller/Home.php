<?php

namespace Controller;

use Dao\Vehicle;

class Home extends LoggedPageController {

    function index() {
        $page = $_GET['page']??1;
        if(!is_numeric($page) || !is_int((int)$page) || $page<=0) {
            $this->redirect('home');
        }

        $offset = ($page-1)*10;

        $vehicleDao = new Vehicle();
        $vehicles = $vehicleDao->get($offset)??[];
        $count = $vehicleDao->getCount();

        if($offset>=$count && $count!=0) {
            $this->redirect('home');
        }
        
        $this->view('home', [
            'vehicles' => $vehicles,
            'count' => $count,
            'page' => $page
        ]);
    }

}