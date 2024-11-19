<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacoes extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // ID do usuário que fez a avaliação
        'nota',    // A nota (de 1 a 5)
    ];

    // Relacionamento com o usuário (se houver)
    public function user()
    {
        return $this->belongsTo(Usuario::class);
    }
}
