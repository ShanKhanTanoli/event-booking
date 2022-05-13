<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'plan_id',
        'active',
        'amount',
        'amount_decimal',
        'currency',
        'interval',
        'interval_count',
        'product_id',
        'slug',
    ];
}
