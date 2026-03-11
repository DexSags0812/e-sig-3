<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'firstname',
        'mi',
        'lastname',
        'extension_name',
        'email',
        'esig',
        'position',
        'division',
        'role',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Full name accessor - so auth()->user()->name works
    public function getNameAttribute()
    {
        return trim("{$this->firstname} {$this->lastname}");
    }

    // Initials method - so auth()->user()->initials() works
    public function initials(): string
    {
        return strtoupper(
            substr($this->firstname, 0, 1) . substr($this->lastname, 0, 1)
        );
    }
}