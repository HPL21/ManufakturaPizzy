<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'placed_at',
        'completed_at',
        'total_price',
        'total_weight',
        'total_calories',
        'recipient_name',
        'recipient_address',
        'recipient_phone',
        'recipient_email',
        'payment_method'
    ];
    public $timestamps = false;
    use HasFactory;
}
