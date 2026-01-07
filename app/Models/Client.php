<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
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
        return $this->hasMany(Payment::class); //Un cliente puede tener muchos pagos
    }
}
