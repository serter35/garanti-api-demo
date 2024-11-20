<?php

namespace App\Contract;

use App\Entities\Payment\Garanti\Order;

interface IOrderRepository
{
    public function findOneByUuid(int $id): ?Order;
}
