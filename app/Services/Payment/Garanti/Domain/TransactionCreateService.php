<?php

namespace App\Services\Payment\Garanti\Domain;

use App\Entities\Payment\Garanti\Transaction;
use App\Enums\TransactionTypeEnum;
use App\Models\Order;

class TransactionCreateService
{
    public function createFromOrderModel(Order $order, $cardHolderPresentCode = 0): Transaction
    {
        return new Transaction(
            TransactionTypeEnum::SALES,
            $order->amount,
            $order->currency_code,
            $cardHolderPresentCode,
            'N',
            0
        );
    }
}
