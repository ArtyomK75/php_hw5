<?php

namespace Palmo\HW5\model\vehicles\impl;

use Palmo\HW5\model\vehicles\Vehicle;

class Car extends Vehicle
{
    private $dailyRate;

    public function __construct($brand, $model, $year, $dailyRate)
    {
        parent::__construct($brand, $model, $year);
        $this->dailyRate = $dailyRate;
    }


    public function calculateRentalCost($days): int
    {
        return $this->dailyRate * $days;
    }
}