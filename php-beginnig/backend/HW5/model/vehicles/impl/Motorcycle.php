<?php

namespace Palmo\HW5\model\vehicles\impl;

use Palmo\HW5\model\vehicles\Vehicle;

class Motorcycle extends Vehicle
{
    private $hourlyRate;

    public function __construct($brand, $model, $year, $hourlyRate)
    {
        parent::__construct($brand, $model, $year);
        $this->hourlyRate = $hourlyRate;
    }

    public function calculateRentalCost($days): int
    {
        return $this->hourlyRate * $this->hourlyRate;
    }
}