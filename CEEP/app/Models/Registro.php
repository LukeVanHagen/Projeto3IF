<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table = 'registros'; 
    protected $fillable = ['rfid', 'data_hora', 'local_id', 'tipo'];

    public function local()
    {
        return $this->belongsTo(Local::class, 'local_id');
    }
}
