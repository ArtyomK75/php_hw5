<?php

namespace Palmo\HW5\model\rental;

use Palmo\HW5\model\vehicles\Vehicle;

class DescriptionRentalVehicle
{
    private Vehicle $Vehicle;
    private int $DaysInRent;
    private int $RentalDate;

    public function __construct(Vehicle $Vehicle, int $DaysInRent, int $RentalDate)
    {
        $this->Vehicle = $Vehicle;
        $this->DaysInRent = $DaysInRent;
        $this->RentalDate = $RentalDate;
    }

    public function getVehicle(): Vehicle
    {
        return $this->Vehicle;
    }

    public function getDaysInRent(): int
    {
        return $this->DaysInRent;
    }

    public function getRentalDate(): int
    {
        return $this->RentalDate;
    }


}