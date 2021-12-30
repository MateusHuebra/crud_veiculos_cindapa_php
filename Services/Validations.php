<?php

namespace Services;

use Dao\Vehicle;

class Validations {

    static function listVehicleValidationErrors(array $vehicle) : bool {
        $errors = [];
        $vehicleDao = new Vehicle();
        /*
        'chassis_number' => 'required|size:17|unique:vehicles,chassis_number,'.$request->input('id'),
        'brand' => 'required|min:3|max:32',
        'model' => 'required|min:1|max:32',
        'year' => 'required|integer|min:1769',
        'plate' => 'required|size:7|regex:/^[A-Z]{3}[0-9]{1}[A-Z0-9]{1}[0-9]{2}$/|unique:vehicles,plate,'.$request->input('id'),
        'number_of_characteristics' => 'integer|min:2'
        */

        if(strlen($vehicle['chassis_number'])!==17) {
            $errors['chassis_number'] = 'o número do chassi deve conter 17 caracteres';
        } else if(
            (
                !isset($vehicle['id'])
                &&
                $vehicleDao->getByChassisNumber($vehicle['chassis_number']!=null)
            )
            ||
            (
                isset($vehicle['id'])
                &&
                $vehicleDao->getByChassisNumber($vehicle['chassis_number'])!=null
                &&
                $vehicleDao->getByChassisNumber($vehicle['chassis_number'])['id']!=$vehicle['id']
            )
        ) {
            $errors['chassis_number'] = 'o número do chassi já está em uso';
        }

        if(strlen($vehicle['brand'])<3 || strlen($vehicle['brand'])>32) {
            $errors['brand'] = 'a marca deve possuir entre 3 e 32 caracteres';
        }

        if(strlen($vehicle['model'])<1 || strlen($vehicle['model'])>32) {
            $errors['model'] = 'o modelo deve possuir entre 1 e 32 caracteres';
        }
        
        if($vehicle['year']<1769 || $vehicle['year']>(date('Y')+1)) {
            $errors['year'] = 'ano inválido';
        }

        if(!preg_match('/^[A-Z]{3}[0-9]{1}[A-Z0-9]{1}[0-9]{2}$/', $vehicle['plate'])) {
            $errors['plate'] = 'formato de placa inválido';
        } else if(
            (
                !isset($vehicle['id'])
                &&
                $vehicleDao->getByPlate($vehicle['plate']!=null))
            ||
            (
                isset($vehicle['id'])
                &&
                $vehicleDao->getByPlate($vehicle['plate'])!=null
                &&
                $vehicleDao->getByPlate($vehicle['plate'])['id']!=$vehicle['id']
            )
        ) {
            $errors['plate'] = 'a placa já está em uso';
        }

        if(count($vehicle['characteristics'])<2) {
            $errors['characteristics'] = 'escolha pelo menos duas características';
        }

        if(empty($errors)) {
            return false;
        }
        
        SessionMessages::set('errors', $errors);
        return true;
    }

}