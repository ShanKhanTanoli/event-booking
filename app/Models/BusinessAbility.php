<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BusinessAbility extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'can_view_reservation',
        'can_create_reservation',
        'can_update_reservation',
        'can_delete_reservation',

        'can_view_client',
        'can_create_client',
        'can_update_client',
        'can_delete_client',
        'can_verify_client',
        'can_add_client',
        'can_remove_client',

        'can_view_pricing_plan',
        'can_create_pricing_plan',
        'can_update_pricing_plan',
        'can_delete_pricing_plan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
