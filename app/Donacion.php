<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Beneficiario;

class Donacion extends Model
{
    protected $fillable = [
        'beneficiario_id',
        'cantidad',
        'donador_name',
    ];

    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }
}
