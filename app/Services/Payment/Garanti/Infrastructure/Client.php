<?php

namespace App\Services\Payment\Garanti\Infrastructure;

use App\Contract\IClient;
use App\Http\DTOs\SalePaymentData;

class Client extends BaseClient implements IClient
{
    public function sale(SalePaymentData $data)
    {
        return $this->post($data);
    }
}
