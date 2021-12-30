<?php

namespace Dao;

use Model\VehicleCharacteristic as ModelVehicleCharacteristic;

class VehicleCharacteristic extends Dao {

    function getByVehicleId(int $id) : array {
        $query = "SELECT * FROM vehicle_characteristics
            WHERE vehicle_id = $id";
        $connection = $this->getConnection();
        $queryResults = $connection->selectAll($query);
        $vehicleCharacteristics = [];
        foreach($queryResults as $queryResult) {
            $vehicleCharacteristics[] = $this->createModel($queryResult);
        }
        return $vehicleCharacteristics;
    }

    function deleteByVehicleId(int $id) {
        $query = "DELETE FROM vehicle_characteristics
            WHERE vehicle_id = $id";
        $connection = $this->getConnection();
        return $connection->query($query);
    }

    function save(ModelVehicleCharacteristic $vehicleCharacteristic) {
        $query = "INSERT INTO vehicle_characteristics (vehicle_id, characteristic)
            VALUES (".$vehicleCharacteristic->getVehicleId()
                .', '.$this->parseStringForQuery($vehicleCharacteristic->getCharacteristic()).")";
        $connection = $this->getConnection();
        $connection->query($query);
    }

    private function createModel($queryResult) {
        return new ModelVehicleCharacteristic(
            $queryResult['id'],
            $queryResult['vehicle_id'],
            $queryResult['characteristic']
        );
    }

}