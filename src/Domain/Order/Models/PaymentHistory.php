<?php

namespace Domain\Order\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'payment_getaway',
        'method',
        'payload',
    ];

    protected $casts = [
        'payload' => 'collection',
    ];

    public function uniqueIds(): array
    {
        return ['payment_id'];
    }
}
