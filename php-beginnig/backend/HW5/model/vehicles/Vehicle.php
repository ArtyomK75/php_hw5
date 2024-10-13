<?php

namespace Palmo\HW5\model\vehicles;
abstract class Vehicle
{
    protected $brand;
    protected $model;
    protected $year;

    /**
     * @param $brand
     * @param $model
     * @param $year
     */
    public function __construct($brand, $model, $year)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
    }
    abstract public function calculateRentalCost($days);

    public function getInfo()
    {
        return "Brand - " . $this->brand . " model -  " . $this->model . " year - " . $this->year;
    }


}