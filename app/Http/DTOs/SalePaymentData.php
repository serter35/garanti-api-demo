<?php

namespace App\Http\DTOs;

use App\Contract\ToXML;
use App\Entities\Payment\Garanti\CreditCard;
use App\Entities\Payment\Garanti\Customer;
use App\Entities\Payment\Garanti\Order;
use App\Entities\Payment\Garanti\Terminal;
use App\Entities\Payment\Garanti\Transaction;
use App\Helpers\XmlHelper;

class SalePaymentData implements ToXML
{
    public function __construct(
        public Terminal $terminal,
        public Customer $customer,
        public CreditCard $creditCard,
        public Order $order,
        public Transaction $transaction,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'Mode'        => config('services.payment-providers.garanti.mode'),
            'Version'     => config('services.payment-providers.garanti.version'),
            'Terminal'    => [
                'ProvUserID' => $this->terminal->provUserId,
                'HashData'   => $this->terminal->hashData,
                'UserID'     => $this->terminal->userId,
                'ID'         => $this->terminal->id,
                'MerchantID' => $this->terminal->merchantId,
            ],
            'Customer'    => [
                'IPAddress'    =>  $this->customer->ipAddress,
                'EmailAddress' =>  $this->customer->emailAddress,
            ],
            'Card'        => [
                'Number'     => $this->creditCard->cardNumber,
                'ExpireDate' => $this->creditCard->GetExpireInfo(),
                'CVV2'       => $this->creditCard->cvv,
            ],
            'Order'       => [
                'OrderID'     => $this->order->orderId,
                'GroupID'     => $this->order->groupId
            ],
            'Transaction' => [
                'Type'                  => $this->transaction->type,
                'Amount'                => (string) $this->transaction->getAmountAsInt(),
                'CurrencyCode'          => (string) $this->transaction->currencyCode,
                'CardholderPresentCode' => $this->transaction->cardholderPresentCode,
                'MotoInd'               => $this->transaction->motoInd
            ],
        ];
    }

    public function toXml(): bool|string
    {
        return XmlHelper::ArrayToXml($this->toArray(), '<GVPSRequest/>');
    }
}
