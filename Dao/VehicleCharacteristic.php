<?php

namespace Dao;

class VehicleCharacteristic extends Dao {

    function getByVehicleId(int $id) {
        $query = "SELECT * FROM vehicle_characteristics";
        $connection = $this->getConnection();
        return $connection->selectAll($query);
    }

    function deleteByVehicleId(int $id) {
        $query = "DELETE FROM vehicle_characteristics
            WHERE vehicle_id = $id";
        $connection = $this->getConnection();
        return $connection->query($query);
    }

    function save(array $vehicleCharacteristic) {
        $query = "INSERT INTO vehicle_characteristics (vehicle_id, characteristic)
            VALUES (".$vehicleCharacteristic['vehicle_id']
                .', '.$this->parseStringForQuery($vehicleCharacteristic['characteristic']).")";
        $connection = $this->getConnection();
        $connection->query($query);
    }

}