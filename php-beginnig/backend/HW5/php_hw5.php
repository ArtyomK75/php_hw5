<?php
namespace Palmo\HW5;

    use Palmo\HW5\model\payments\impl\CreditCardPayment;
    use Palmo\HW5\model\rental\RentalSystem;
    use Palmo\HW5\model\vehicles\impl\Car;
    use Palmo\HW5\model\vehicles\impl\Motorcycle;

    $renalSystem = new RentalSystem();
    //set different vehicles
    $car1 = new Car("Honda", "Civic", 2018, 60);
    $car2 = new Car("Subaru", "Impreza", 2021, 80);
    $car3 = new Car("Toyota", "RAV4", 2019, 70);
    $car4 = new Car("Dodge", "RAM-150", 2017, 120);
    //moto`s
    $moto1 = new Motorcycle("Kavasaki", "K750", 2022, 130);
    $moto2 = new Motorcycle("Honda", "DIO", 2012, 10);
    $moto3 = new Motorcycle("Suzuki", "GSRX750", 2019, 90);

    $renalSystem->addVehicle($car1);
    $renalSystem->addVehicle($car2);
    $renalSystem->addVehicle($car3);
    $renalSystem->addVehicle($car4);
    $renalSystem->addVehicle($moto1);
    $renalSystem->addVehicle($moto2);
    $renalSystem->addVehicle($moto3);
    //try to add one more time
    $renalSystem->addVehicle($moto3);

    //rent process
    $creditCardPayment = new CreditCardPayment("1111 1111 2222 3333", date_create("2026-12-01"), 2000);
    $daysRent = 5;
    $amountRent = $car2->calculateRentalCost($daysRent);
    if ($creditCardPayment->processPayment($amountRent) && $renalSystem->rentVehicle($car2, $daysRent, time())) {
        echo $car2->getInfo() . " successfully get in rent";
        echo "</BR>";
    }

    $daysRent = 3;
    $amountRent = $car3->calculateRentalCost($daysRent);
    if ($creditCardPayment->processPayment($amountRent) && $renalSystem->rentVehicle($car3, $daysRent, time())) {
        echo $car3->getInfo() . " successfully get in rent";
        echo "</BR>";
    }

    $daysRent = 7;
    $amountRent = $moto2->calculateRentalCost($daysRent);
    if ($creditCardPayment->processPayment($amountRent) && $renalSystem->rentVehicle($moto2, $daysRent, time())) {
        echo $car3->getInfo() . " successfully get in rent";
        echo "</BR>";
    }

    //test exceptions
    $renalSystem->rentVehicle($car2, $daysRent, time());
    $creditCardPayment->processPayment(7000);

