<?php

namespace App\Policies;

use App\Models\Terminal;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TerminalPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Terminal $terminal): bool
    {
        return $user->roles->whereIn('name', ['admin', 'viewer'])->isNotEmpty();
    }


    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Terminal $terminal): bool
    {
        return $user->roles->contains('name', 'admin');
    }
}
