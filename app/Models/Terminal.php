<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Terminal extends Model
{
    protected $fillable = [
        'merchant_id',
        'provision_user_id',
        'provision_user_password', // hashed
        'terminal_id',
        'store_key',
    ];

    protected function casts(): array
    {
        return [
            'terminal_id' => 'int',
        ];
    }

    protected function provisionUserPassword(): Attribute
    {
        if (!$this->hasAttribute('terminal_id') && !$this->terminal_id) {
            throw new \Exception('Provision user password not set because terminal_id not set');
        }

        return Attribute::set(fn($password) => garanti_password_hash($password, $this->terminal_id));
    }
}
