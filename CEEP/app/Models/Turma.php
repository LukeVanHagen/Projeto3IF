<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        
    ]; 
    public function alunos()
    {
        return $this->hasMany(Aluno::class, 'turma_id');
    }
    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }
    public function hasHorario($dia, $periodo)
    {
        return $this->horarios()->where('dia', $dia)->where('periodo', $periodo)->exists();
    }

}
