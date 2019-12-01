<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Donacion;

class Beneficiario extends Model
{
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function beneficiario()
    {
        return $this->hasOne(Donacion::class, 'beneficiario_id');
    }
}
