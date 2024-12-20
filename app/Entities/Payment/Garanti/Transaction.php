<?php

namespace App\Entities\Payment\Garanti;

class Transaction
{
    public $type;
    public $amount;
    public $currencyCode;
    public $cardholderPresentCode;
    public $motoInd;
    public $installment;
    public function __construct($type, $amount, $currencyCode, $cardholderPresentCode, $motoInd, $installment = 0)
    {
        $this->type = $type;
        $this->amount = $amount;
        $this->currencyCode = $currencyCode;
        $this->cardholderPresentCode = $cardholderPresentCode;
        $this->motoInd = $motoInd;
        $this->installment = $installment == 1 || $installment == 0 ?  "" : (string) $installment;
    }

    public function getAmountAsInt(): int
    {
        return $this->amount * 100;
    }
}
