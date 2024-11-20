<?php

namespace App\Repositories;

use App\Contract\ITerminalRepository;
use App\Entities\Payment\Garanti\Terminal;
use App\Models\Terminal as TerminalEloquent;

class TerminalEloquentRepository implements ITerminalRepository
{
    public function findOneById(int $id): ?Terminal
    {
        $model = TerminalEloquent::find($id);

        if (!$model)
            return null;

        return Terminal::fromEloquentModel($model);
    }
}
