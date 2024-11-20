<?php

namespace App\Services\Payment\Garanti\Domain;

use App\Contract\ITerminalRepository;
use App\Entities\Payment\Garanti\Terminal;

readonly class TerminalCreateService
{
    private Terminal $terminal;

    public function __construct(
        private ITerminalRepository $terminalRepository
    )
    {
        // Tek Terminal olduğu için ilk terminal çekiliyor.
        $this->terminal = $this->terminalRepository->findOneById(1);
    }

    public function create(string $orderId, string $cardNumber, string $amount, string $currencyCode): Terminal
    {
        $this->terminal->setHashData($orderId, $cardNumber, $amount, $currencyCode);

        return $this->terminal;
    }
}
