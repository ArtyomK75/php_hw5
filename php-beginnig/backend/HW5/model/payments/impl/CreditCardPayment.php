<?php

namespace Palmo\HW5\model\payments\impl;

use Palmo\HW5\model\payments\PaymentMethod;

use Cassandra\Date;

class CreditCardPayment implements PaymentMethod
{
    private $cardNumber;
    private $expirationDate;
    private $accountBalance;


    /**
     * @param $cardNumber
     * @param $expirationDate
     */
    public function __construct($cardNumber, $expirationDate, $accountBalance)
    {
        $this->cardNumber = $cardNumber;
        $this->expirationDate = $expirationDate;
        $this->accountBalance = $accountBalance;
    }

    /**
     * @return mixed
     */
    public function getAccountBalance()
    {
        return $this->accountBalance;
    }


    public function processPayment($amount)
    {
        if ($this->expirationDate == null) {
            echo "Expiration date is null";
            echo "</BR>";
            return false;
        }

        if ($this->cardNumber == null) {
            echo "Card number is null";
            echo "</BR>";
            return false;
        }

        if ($this->expirationDate < new \DateTime()) {
            echo "Expiration date is not valid";
            echo "</BR>";
            return false;
        }

        if ($this->accountBalance < $amount) {
            echo "No enough money on account balance";
            echo "</BR>";
            return false;
        }

        $this->accountBalance -= $amount;

        return true;
    }

}
