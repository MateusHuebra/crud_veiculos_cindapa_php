<?php

namespace Controller;

use Dao\Vehicle as DaoVehicle;
use Model\Vehicle as ModelVehicle;
use Model\VehicleCharacteristic;
use Services\SessionMessages;
use Services\Validations;

class Vehicle extends LoggedPageController {

    function add() {
        $vehicle = SessionMessages::get('vehicle');
        if($vehicle===false) {
            $vehicle = new ModelVehicle();
        }
        $this->view('addVehicle');
        $this->view('formVehicle', [
            'errors' => SessionMessages::get('errors'),
            'vehicle' => $vehicle
        ]);
    }

    function edit() {
        $vehicle = SessionMessages::get('vehicle');
        if($vehicle===false) {
            $vehicle = (new DaoVehicle)->getById($_GET['id']);
        }
        if(empty($vehicle)) {
            $this->redirect('home');
        }
        $this->view('editVehicle');
        $this->view('formVehicle', [
            'vehicle' => $vehicle,
            'errors' => SessionMessages::get('errors')
        ]);
    }

    function save() {
        $vehicle = new ModelVehicle();
        if(isset($_POST['id'])) {
            $vehicle->setId($_POST['id']);
        }
        $vehicle->setChassisNumber($_POST['chassis_number']);
        $vehicle->setBrand($_POST['brand']);
        $vehicle->setModel($_POST['model']);
        $vehicle->setYear($_POST['year']);
        $vehicle->setPlate($_POST['plate']);
        
        if(isset($_POST['characteristicsModel'])) {
            $vehicle->setCharacteristic(new VehicleCharacteristic(
                null,
                $vehicle->getId(),
                $_POST['characteristicsModel']
            ));
        }
        if(isset($_POST['characteristicsType'])) {
            $vehicle->setCharacteristic(new VehicleCharacteristic(
                null,
                $vehicle->getId(),
                $_POST['characteristicsType']
            ));
        }
        if(isset($_POST['characteristicsDistance'])) {
            $vehicle->setCharacteristic(new VehicleCharacteristic(
                null,
                $vehicle->getId(),
                $_POST['characteristicsDistance']
            ));
        }

        if(Validations::listVehicleValidationErrors($vehicle)) {
            SessionMessages::set('vehicle', $vehicle);
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