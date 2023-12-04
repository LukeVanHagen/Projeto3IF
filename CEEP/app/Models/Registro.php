<?php

// app/Models/Registro.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nome',
        'turma',
        'data_hora',
        'local_id',
    ];

    // Relacionamento com o modelo User (aluno)
    public function aluno()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Outros relacionamentos, se houver
}

