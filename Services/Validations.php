<?php

namespace Services;

class Validations {

    static function listVehicleValidationErrors(array $vehicle) {
        $errors = [];

        if(strlen($vehicle['chassis_number'])!==17) {
            $errors['chassis_number'] = 'o número do chassi deve conter 17 caracteres';
        }

        if(empty($errors)) {
            return false;
        }
        return $errors;
    }

}