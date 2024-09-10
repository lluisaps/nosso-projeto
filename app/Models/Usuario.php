<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as AuthenticatableModel;

class Usuario extends AuthenticatableModel implements AuthenticatableContract
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'nome',
        'login',
        'email',
        'password',
        'foto_perfil',
        'email_verificado',
        'admin'
    ];

    protected $hidden = [
        'password',
        'remember_token'
        
    ];

    protected function casts(): array
    {
        return [
            'data_verificacao' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
