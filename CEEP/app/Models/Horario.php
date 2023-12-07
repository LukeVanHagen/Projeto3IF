<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = [
        'dia',
        'periodo',
        'turma_id',
    ];

    public function turma()
    {
        return $this->belongsTo(Turma::class);
    }
}
