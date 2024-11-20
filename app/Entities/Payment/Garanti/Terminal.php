<?php

namespace App\Entities\Payment\Garanti;

use App\Models\Terminal as ModelTerminal;
use App\Services\Payment\Garanti\Domain\GenerateTerminalHashDataService;

class Terminal
{
    public string $hashData;

    public function __construct(
        public string $id,
        public string $provUserId,
        public string $userId,
        public string $hashPassword,
        public string $merchantId
    )
    {

    }

    public static function fromEloquentModel(ModelTerminal $terminal): static
    {
        return new static(
            id: $terminal->terminal_id,
            provUserId: $terminal->provision_user_id,
            userId: $terminal->provision_user_id,
            hashPassword: $terminal->provision_user_password,
            merchantId: $terminal->merchant_id,
        );
    }

    public function setHashData($orderId, $cardNumber, $amount, $currencyCode): void
    {
        $this->hashData = (new GenerateTerminalHashDataService(
            $orderId,
            $this->id,
            $cardNumber,
            $amount,
            $currencyCode,
            $this->hashPassword
        ))->getHash();
    }
}
