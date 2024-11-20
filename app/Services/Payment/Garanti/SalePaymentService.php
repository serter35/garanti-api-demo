<?php

namespace App\Services\Payment\Garanti;

use App\Contract\IClient;
use App\Entities\Payment\Garanti\CreditCard;
use App\Http\DTOs\SalePaymentData;
use App\Models\Order;
use App\Services\Payment\Garanti\Domain\CustomerCreateService;
use App\Services\Payment\Garanti\Domain\OrderCreateService;
use App\Services\Payment\Garanti\Domain\TerminalCreateService;
use App\Services\Payment\Garanti\Domain\TransactionCreateService;

class SalePaymentService
{
    protected SalePaymentData $data;

    public function __construct(
        private readonly TerminalCreateService $terminalCreateService,
        private readonly OrderCreateService $orderCreateService,
        private readonly CustomerCreateService $customerCreateService,
        private readonly TransactionCreateService $transactionCreateService,
        private readonly IClient $client,
    )
    {
    }

    public function prepareDataForPayment(CreditCard $creditCard, Order $orderModel): static
    {
        $order = $this->orderCreateService->createFromModel($orderModel);
        $customer = $this->customerCreateService->createFromOrderModel($orderModel);
        $transaction = $this->transactionCreateService->createFromOrderModel($orderModel);
        $terminal = $this->terminalCreateService->create(
            $order->orderId,
            $creditCard->cardNumber,
            $transaction->getAmountAsInt(),
            $transaction->currencyCode
        );

        $this->data = new SalePaymentData($terminal, $customer, $creditCard, $order, $transaction);

        return $this;
    }

    public function processPayment()
    {
        return $this->client->sale($this->data);
    }
}
