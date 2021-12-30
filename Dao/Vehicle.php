<?php

namespace Dao;

use Dao\VehicleCharacteristic as DaoVehicleCharacteristic;
use Model\Vehicle as ModelVehicle;

class Vehicle extends Dao {

    function get(int $offset = 0, int $limit = 10) {
        $query = "SELECT v.*, GROUP_CONCAT(vh.characteristic) as characteristics FROM vehicles v
            LEFT JOIN vehicle_characteristics vh ON v.id = vh.vehicle_id
            GROUP BY v.id
            LIMIT $limit OFFSET $offset";
        $connection = $this->getConnection();
        $queryResults = $connection->selectAll($query);
        if(empty($queryResults)) {
            return null;
        }
        $vehicles = [];
        foreach ($queryResults as $queryResult) {
            $vehicles[] = $this->createModel($queryResult);
        }

        return $vehicles;
    }

    function getCount() {
        $query = "SELECT count(id) as 'count' FROM vehicles";
        $connection = $this->getConnection();
        $count = $connection->selectOne($query)['count'];
        return $count;
    }

    function getById(int $id) {
        $query = "SELECT v.*, GROUP_CONCAT(vh.characteristic) as characteristics FROM vehicles v
            LEFT JOIN vehicle_characteristics vh ON v.id = vh.vehicle_id
            WHERE v.id = $id
            GROUP BY v.id";
        $connection = $this->getConnection();
        $queryResult = $connection->selectOne($query);
        if(empty($queryResult)) {
            return null;
        }
        $vehicle = $this->createModel($queryResult);
        
        return $vehicle;
    }

    function getByChassisNumber(string $chassisNumber) {
        $query = "SELECT v.*, GROUP_CONCAT(vh.characteristic) as characteristics FROM vehicles v
            LEFT JOIN vehicle_characteristics vh ON v.id = vh.vehicle_id
            WHERE v.chassis_number = ".$this->parseStringForQuery($chassisNumber)."
            GROUP BY v.id";
        $connection = $this->getConnection();
        $queryResult = $connection->selectOne($query);
        if(empty($queryResult)) {
            return null;
        }

        $vehicle = $this->createModel($queryResult);

        return $vehicle;
    }

    function getByPlate(string $plate) {
        $query = "SELECT v.*, GROUP_CONCAT(vh.characteristic) as characteristics FROM vehicles v
            LEFT JOIN vehicle_characteristics vh ON v.id = vh.vehicle_id
            WHERE v.plate = ".$this->parseStringForQuery($plate)."
            GROUP BY v.id";
        $connection = $this->getConnection();
        $queryResult = $connection->selectOne($query);
        if(empty($queryResult)) {
            return null;
        }

        $vehicle = $this->createModel($queryResult);

        return $vehicle;
    }

    function save(ModelVehicle $vehicle) {
        $query = "INSERT INTO vehicles (id, chassis_number, brand, model, `year`, plate)
            VALUES (".$this->parseIntForQuery($vehicle->getId()??null)
                .', '.$this->parseStringForQuery($vehicle->getChassisNumber())
                .', '.$this->parseStringForQuery($vehicle->getBrand())
                .', '.$this->parseStringForQuery($vehicle->getModel())
                .', '.$this->parseIntForQuery($vehicle->getYear())
                .', '.$this->parseStringForQuery($vehicle->getPlate())
            .")
            ON DUPLICATE KEY UPDATE
                chassis_number = ".$this->parseStringForQuery($vehicle->getChassisNumber()).',
                brand = '.$this->parseStringForQuery($vehicle->getBrand()).',
                model = '.$this->parseStringForQuery($vehicle->getModel()).',
                `year` = '.$this->parseIntForQuery($vehicle->getYear()).',
                plate = '.$this->parseStringForQuery($vehicle->getPlate());
        $connection = $this->getConnection();
        $lastInsertedId = $connection->query($query);
        if($lastInsertedId!=0) {
            $vehicle->setId($lastInsertedId);
        }
        
        if(!empty($vehicle->getCharacteristics())) {
            $vh = new DaoVehicleCharacteristic();
            $vh->deleteByVehicleId($vehicle->getId());
            foreach ($vehicle->getCharacteristics() as $characteristic) {
                $characteristic->setVehicleId($vehicle->getId());
                $vh->save($characteristic);
            }
        }
    }

    function delete(int $id) {
        (new DaoVehicleCharacteristic)->deleteByVehicleId($id);
        $query = "DELETE FROM vehicles
            WHERE id = $id";
        $connection = $this->getConnection();
        return $connection->query($query);
    }

    private function createModel($queryResult) {
        return new ModelVehicle(
            $queryResult['id'],
            $queryResult['chassis_number'],
            $queryResult['brand'],
            $queryResult['model'],
            $queryResult['year'],
            $queryResult['plate'],
            (new DaoVehicleCharacteristic)->getByVehicleId($queryResult['id'])
        );
    }

}