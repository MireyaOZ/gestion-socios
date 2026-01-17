<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  //Permite eliminar registros sin borrarlos físicamente, borrado lógico

class Client extends Model
{
    use SoftDeletes;
    
    protected $fillable = [     //define campos que se pueden llenar automáticamente
        'contract_number',
        'curp',
        'name',
        'street',
        'colony',
        'interior_number',
        'exterior_number',
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class); //Un cliente puede tener muchos pagos,  1 a muchos
    }
}
