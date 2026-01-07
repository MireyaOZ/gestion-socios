<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'client_id',
        'receipt_number',
        'amount',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);  //cada pago pertenece a un cliente
    }
}
