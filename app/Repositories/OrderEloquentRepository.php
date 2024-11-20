<?php

namespace App\Repositories;

use App\Contract\IOrderRepository;
use App\Entities\Payment\Garanti\Order;
use App\Models\Order as OrderEloquent;
use Illuminate\Support\Str;

class OrderEloquentRepository implements IOrderRepository
{
    public function findOneByUuid(int $id): ?Order
    {
        $model = OrderEloquent::find($id);

        if (is_null($model)) {
            return null;
        }

        return new Order(
            $model->id,
            ''
        );
    }
}
