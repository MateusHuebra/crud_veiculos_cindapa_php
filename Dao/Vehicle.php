<?php

namespace Dao;

class Vehicle extends Dao {

    function get(int $offset = 0, int $limit = 10) {
        $query = "SELECT v.*, GROUP_CONCAT(vh.characteristic) as characteristics FROM vehicles v
        LEFT JOIN vehicle_characteristics vh ON v.id = vh.vehicle_id
        GROUP BY v.id
        LIMIT $limit OFFSET $offset";
        $connection = $this->getConnection();
        $vehicles = $connection->selectAll($query);
        if(empty($vehicles)) {
            return null;
        }
        foreach ($vehicles as $key => $vehicle) {
            if(!empty($vehicle['characteristics'])) {
                $vehicles[$key]['characteristics'] = explode(',', $vehicle['characteristics']);
            } else {
                $vehicles[$key]['characteristics'] = [];
            }
        }
        return $vehicles;
    }

    function getById(int $id) {
        $query = "SELECT v.*, GROUP_CONCAT(vh.characteristic) as characteristics FROM vehicles v
        LEFT JOIN vehicle_characteristics vh ON v.id = vh.vehicle_id
        WHERE v.id = $id
        GROUP BY v.id";
        $connection = $this->getConnection();
        $vehicle = $connection->selectOne($query);
        if(empty($vehicle)) {
            return null;
        }
        if(!empty($vehicle['characteristics'])) {
            $vehicle['characteristics'] = explode(',', $vehicle['characteristics']);
        } else {
            $vehicle['characteristics'] = [];
        }
        return $vehicle;
    }

    function save(array $vehicle) {
        $query = "INSERT INTO vehicles (id, chassis_number, brand, model, `year`, plate)
            VALUES (".$this->parseIntForQuery($vehicle['id']??null)
                .', '.$this->parseStringForQuery($vehicle['chassis_number'])
                .', '.$this->parseStringForQuery($vehicle['brand'])
                .', '.$this->parseStringForQuery($vehicle['model'])
                .', '.$this->parseIntForQuery($vehicle['year'])
                .', '.$this->parseStringForQuery($vehicle['plate'])
            .")
            ON DUPLICATE KEY UPDATE
                chassis_number = ".$this->parseStringForQuery($vehicle['chassis_number']).',
                brand = '.$this->parseStringForQuery($vehicle['brand']).',
                model = '.$this->parseStringForQuery($vehicle['model']).',
                `year` = '.$this->parseIntForQuery($vehicle['year']).',
                plate = '.$this->parseStringForQuery($vehicle['plate']);
        $connection = $this->getConnection();
        $vehicle['id'] = $connection->query($query);

        if(!empty($vehicle['characteristics'])) {
            $vh = new VehicleCharacteristic();
            $vh->deleteByVehicleId($vehicle['id']);
            foreach ($vehicle['characteristics'] as $characteristic) {
                $characteristic = [
                    'vehicle_id' => $vehicle['id'],
                    'characteristic' => $characteristic
                ];
                $vh->save($characteristic);
            }
        }
    }

    function delete(int $id) {
        (new VehicleCharacteristic)->deleteByVehicleId($id);
        $query = "DELETE FROM vehicles
            WHERE id = $id";
        $connection = $this->getConnection();
        return $connection->query($query);
    }

}