<?php

namespace Model;

class VehicleCharacteristic {

    private $id;
    private $vehicle_id;
    private $characteristic;

    function __construct(int $id=null, int $vehicle_id=null, string $characteristic=null) {
        $this->id = $id;
        $this->vehicle_id = $vehicle_id;
        $this->characteristic = $characteristic;
    }

    function getId() {
        return $this->id;
    }
    function getVehicleId() {
        return $this->vehicle_id;
    }
    function getCharacteristic() {
        return $this->characteristic;
    }

    function setId(int $id) {
        $this->id = $id;
    }
    function setVehicleId(int $vehicleId) {
        $this->vehicle_id = $vehicleId;
    }
    function setCharacteristic(string $characteristic) {
        $this->characteristic = $characteristic;
    }

}