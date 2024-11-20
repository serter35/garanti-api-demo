<?php

/**
 * customer object model
 */

namespace App\Entities\Payment\Garanti;

class Customer
{
    public $emailAddress;
    public $ipAddress;

    public function __construct($emailAddress, $ipAddress)
    {
        $this->emailAddress = $emailAddress;
        $this->ipAddress = '192.168.0.1'; //$ipAddress;
    }
}
