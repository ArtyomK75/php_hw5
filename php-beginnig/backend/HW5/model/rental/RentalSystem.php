<?php

namespace Palmo\HW5\model\rental;



use DateTime;
use Palmo\HW5\model\vehicles\Vehicle;

class RentalSystem
{
    private array $vehicles = [];
    private array $vehiclesInRent = [];

    public function getVehicles() {
        return $this->vehicles;
    }

    public function addVehicle(Vehicle $vehicle): bool
    {
        if (!in_array($vehicle, $this->vehicles)) {
            $this->vehicles[] = $vehicle;
            return true;
        }
        echo "Vehicle" . $vehicle->getInfo() . " is already in rental system";
        echo "</BR>";
        return false;
    }

    public function rentVehicle(Vehicle $vehicle, int $days, int $DateRental): bool
    {
        if ($this->isVehicleAvailableForRent($vehicle)) {
            $this->vehiclesInRent[] = new DescriptionRentalVehicle($vehicle, $days, $DateRental);
            unset($this->vehicles[array_search($vehicle, $this->vehicles)]);
            return true;
        };
        $returnDate = null;
        foreach ($this->vehiclesInRent as $rental) {
            if ($rental->getVehicle() == $vehicle) {
                $datetime = DateTime::createFromFormat('U', $rental->getRentalDate());;
                $date = date_modify($datetime, '+' . $rental->getDaysInRent() . ' days');
                $returnDate = $date->format('Y-m-d');
                break;
            }
        }
        echo "The vehicle" . $vehicle->getInfo() . " is already rented.\n";
        if (isset($returnDate)) {
            echo "And will be available after " . $returnDate;
            echo "</BR>";
        }
        return false;
    }

    public function returnVehicleFromRent(Vehicle $vehicle): bool
    {
        if ($this->isVehicleInRent($vehicle)) {
            $this->vehicles[] = $vehicle;
            unset($this->vehiclesInRent[array_search($vehicle, $this->vehiclesInRent)]);
            return true;
        };
        echo "The vehicle" . $vehicle->getInfo() . " is not rented.";
        echo "</BR>";
        return false;
    }

    private function isVehicleInRent(Vehicle $vehicle): bool
    {
        foreach ($this->vehiclesInRent as $rental) {
            if ($rental->getVehicle() == $vehicle) {
                return true;
            }
        }
        return false;
    }

    private function isVehicleAvailableForRent(Vehicle $vehicle): bool
    {
        return in_array($vehicle, $this->vehicles);
    }
}

