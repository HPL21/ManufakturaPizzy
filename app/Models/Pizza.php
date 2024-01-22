<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $fillable = [
        'order_id', 'weight', 'calories', 'price' 
    ];
    public $timestamps = false;
    use HasFactory;
}
