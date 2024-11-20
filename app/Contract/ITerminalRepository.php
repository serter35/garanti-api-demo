<?php

namespace App\Contract;

use App\Entities\Payment\Garanti\Terminal;

interface ITerminalRepository
{
    public function findOneById(int $id): ?Terminal;
}
