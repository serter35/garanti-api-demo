<?php

namespace App\Services\Payment\Garanti\Domain;

readonly class GenerateTerminalHashDataService
{
    public function __construct(
        private string $orderId,
        private int $terminalId,
        private string $cardNumber,
        private float $amount,
        private int $currencyCode,
        private string $hashedPassword,
    )
    {
    }

    public function getHash(): string
    {
        $data = [
            $this->orderId,
            $this->terminalId,
            $this->cardNumber,
            $this->amount,
            $this->currencyCode,
            $this->hashedPassword
        ];

        $shaData = strtoupper(hash("sha512", implode('', $data)));

        return strtoupper($shaData);
    }
}
