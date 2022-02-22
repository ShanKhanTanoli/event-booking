<?php

namespace App\Models;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slot extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slot_id',
        'reservation_id',
        'slug',
        'starting_date',
        'ending_date',
        'starting_time',
        'ending_time',
        'type',
        'token_cost',
        'capacity',
        'can_book_before',
        'can_cancel_before',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
