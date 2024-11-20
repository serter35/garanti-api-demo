<?php

namespace App\Services\Payment\Garanti\Domain;

use App\Entities\Payment\Garanti\Customer;
use App\Models\Order;
use Illuminate\Support\Facades\Request;

class CustomerCreateService
{
    public function createFromOrderModel(Order $order): Customer
    {
        return new Customer(
            $order->customer->email,
            Request::ip()
        );
    }
}
