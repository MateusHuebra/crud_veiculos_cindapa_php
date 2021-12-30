<?php

namespace Model;

class Vehicle {

    private $id;
    private $chassis_number;
    private $brand;
    private $model;
    private $year;
    private $plate;
    private $characteristics;

    function __construct($id = null, $chassis_number = null, $brand = null, $model = null, $year = null, $plate = null, array $characteristics = []) {
        $this->id = $id;
        $this->chassis_number = $chassis_number;
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
        $this->plate = $plate;
        $this->characteristics = $characteristics;
    }

    function getId() {
        return $this->id;
    }
    function getChassisNumber() {
        return $this->chassis_number;
    }
    function getBrand() {
        return $this->brand;
    }
    function getModel() {
        return $this->model;
    }
    function getYear() {
        return $this->year;
    }
    function getPlate() {
        return $this->plate;
    }
    function getCharacteristics() : array {
        return $this->characteristics;
    }

    function setId($id) {
        $this->id = $id;
    }
    function setChassisNumber($chassisNumber) {
        $this->chassis_number = $chassisNumber;
    }
    function setBrand($brand) {
        $this->brand = $brand;
    }
    function setModel($model) {
        $this->model = $model;
    }
    function setYear($year) {
        $this->year = $year;
    }
    function setPlate($plate) {
        $this->plate = $plate;
    }
    function setCharacteristics(array $characteristics) {
        $this->characteristics = $characteristics;
    }
    function setCharacteristic(VehicleCharacteristic $characteristic) {
        return $this->characteristics[] = $characteristic;
    }

    function hasCharacteristic(string $characteristic) {
        foreach($this->characteristics as $item) {
            if($item->getCharacteristic()==$characteristic) {
                return true;
            }
        }
        return false;
    }

    function toJson() : string {
        return json_encode($this->toArray());
    }

    function toArray() : array {
        $array = [
            'id' => $this->id,
            'chassis_number' => $this->chassis_number,
            'brand' => $this->brand,
            'model' => $this->model,
            'year' => $this->year
        ];
        foreach($this->characteristics as $characteristic) {
            $array['characteristics'][] = $characteristic->getCharacteristic();
        }
        return $array;
    }

}