<?php

namespace App\Services\Payment\Garanti\Domain;

use App\Contract\IOrderRepository;
use App\Entities\Payment\Garanti\Order;
use App\Models\Order as OrderModel;

class OrderCreateService
{
    public function __construct(private readonly IOrderRepository $orderRepository)
    {
    }

    public function create(string $orderId): Order
    {
        return $this->orderRepository->findOneByUuid($orderId);
    }

    public function createFromModel(OrderModel $order): Order
    {
        return new Order(
            $order->uuid
        );
    }
}
