<?php

namespace App\Contract;

use App\Http\DTOs\SalePaymentData;

interface IClient
{
    public function sale(SalePaymentData $data);
}
