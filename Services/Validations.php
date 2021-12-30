<?php

namespace Services;

use Dao\Vehicle;
use Model\Vehicle as ModelVehicle;

class Validations {

    static function listVehicleValidationErrors(ModelVehicle $vehicle) : bool {
        $errors = [];
        $vehicleDao = new Vehicle();

        if(strlen($vehicle->getChassisNumber())!==17) {
            $errors['chassis_number'] = 'o número do chassi deve conter 17 caracteres';
        } else if(
            (
                is_null($vehicle->getId())
                &&
                $vehicleDao->getByChassisNumber($vehicle->getChassisNumber()!=null)
            )
            ||
            (
                !is_null($vehicle->getId())
                &&
                $vehicleDao->getByChassisNumber($vehicle->getChassisNumber())!=null
                &&
                $vehicleDao->getByChassisNumber($vehicle->getChassisNumber())->getId()!=$vehicle->getId()
            )
        ) {
            $errors['chassis_number'] = 'o número do chassi já está em uso';
        }

        if(strlen($vehicle->getBrand())<3 || strlen($vehicle->getBrand())>32) {
            $errors['brand'] = 'a marca deve possuir entre 3 e 32 caracteres';
        }

        if(strlen($vehicle->getModel())<1 || strlen($vehicle->getModel())>32) {
            $errors['model'] = 'o modelo deve possuir entre 1 e 32 caracteres';
        }
        
        if($vehicle->getYear()<1769 || $vehicle->getYear()>(date('Y')+1)) {
            $errors['year'] = 'ano inválido';
        }

        if(!preg_match('/^[A-Z]{3}[0-9]{1}[A-Z0-9]{1}[0-9]{2}$/', $vehicle->getPlate())) {
            $errors['plate'] = 'formato de placa inválido';
        } else if(
            (
                is_null($vehicle->getId())
                &&
                $vehicleDao->getByPlate($vehicle->getPlate()!=null))
            ||
            (
                !is_null($vehicle->getId())
                &&
                $vehicleDao->getByPlate($vehicle->getPlate())!=null
                &&
                $vehicleDao->getByPlate($vehicle->getPlate())->getId()!=$vehicle->getId()
            )
        ) {
            $errors['plate'] = 'a placa já está em uso';
        }

        if(count($vehicle->getCharacteristics())<2) {
            $errors['characteristics'] = 'escolha pelo menos duas características';
        }

        if(empty($errors)) {
            return false;
        }
        
        SessionMessages::set('errors', $errors);
        return true;
    }

}