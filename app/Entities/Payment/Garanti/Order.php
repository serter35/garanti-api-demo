<?php

namespace App\Entities\Payment\Garanti;

class Order
{
    public function __construct(public $orderId, public $groupId = "")
    {
    }
}
