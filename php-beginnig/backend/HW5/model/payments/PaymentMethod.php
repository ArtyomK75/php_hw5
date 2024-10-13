<?php
namespace Palmo\HW5\model\payments;
interface PaymentMethod
{
    public function processPayment($amount);
}