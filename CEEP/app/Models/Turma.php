<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        
    ]; // Ou qualquer outro campo que você queira permitir o preenchimento em massa

    // Defina o relacionamento inverso para acessar os alunos de uma turma
    public function alunos()
    {
        return $this->hasMany(Aluno::class, 'turma_id');
    }
}
