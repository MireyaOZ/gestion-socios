<?php

namespace App\Services;

use App\Models\Payment;

class ReceiptService
{
    public function generateReceiptNumber()
    {
        $lastId = Payment::max('id') ?? 0;
        
        return 'REC-' . str_pad($lastId + 1, 5, '0', STR_PAD_LEFT);
    }
}