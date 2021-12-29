<?php

namespace Controller;

use Dao\Vehicle as DaoVehicle;
use Services\Validations;

class Vehicle extends LoggedPageController {

    function add() {
        $this->view('addVehicle');
        $this->view('formVehicle');
    }

    function edit() {
        $vehicle = (new DaoVehicle)->getById($_GET['id']);
        if(empty($vehicle)) {
            $this->redirect('home');
        }
        $this->view('editVehicle');
        $this->view('formVehicle', [
            'vehicle' => $vehicle
        ]);
    }

    function save() {
        $vehicle = [];
        if(isset($_POST['id'])) {
            $vehicle['id'] = $_POST['id'];
        }
        $vehicle['chassis_number'] = $_POST['chassis_number'];
        $vehicle['brand'] = $_POST['brand'];
        $vehicle['model'] = $_POST['model'];
        $vehicle['year'] = $_POST['year'];
        $vehicle['plate'] = $_POST['plate'];
        
        if(isset($_POST['characteristicsModel'])) {
            $vehicle['characteristics'][] = $_POST['characteristicsModel'];
        }
        if(isset($_POST['characteristicsType'])) {
            $vehicle['characteristics'][] = $_POST['characteristicsType'];
        }
        if(isset($_POST['characteristicsDistance'])) {
            $vehicle['characteristics'][] = $_POST['characteristicsDistance'];
        }

        if(Validations::listVehicleValidationErrors($vehicle)) {
            if(isset($_POST['id'])) {
                $this->redirect('vehicle/edit?id='.$_POST['id']);
            } else {
                $this->redirect('vehicle/add');
            }
        } else {
            (new DaoVehicle)->save($vehicle);
            $this->redirect('home');
        }
    }

    function delete() {
        (new DaoVehicle)->delete($_GET['id']);
        $this->redirect('home');
    }

}