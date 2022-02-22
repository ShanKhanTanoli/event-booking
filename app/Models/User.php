<?php

namespace App\Models;

use App\Models\Reservation;
use Laravel\Cashier\Billable;
use App\Models\BusinessAbility;
use App\Models\BusinessSetting;
use App\Models\ClientReservation;
use Laravel\Sanctum\HasApiTokens;
use Rinvex\Subscriptions\Models\Plan;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Rinvex\Subscriptions\Traits\HasPlanSubscriptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, Billable, HasPlanSubscriptions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'avatar',
        'reg_no',
        'name',
        'bio',
        'address',
        'phone',
        'email',
        'email_verified_at',
        'password',
        'role',
        'role_id',
        'created_by',
        'business_avatar',
        'business_name',
        'business_user_name',
        'business_bio',
        'business_address',
        'business_phone',
        'business_email',
        'account_id',
        'customer_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function bookings()
    {
        return $this->hasMany(ClientReservation::class);
    }

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }

    public function abilities()
    {
        return $this->hasOne(BusinessAbility::class);
    }

    public function settings()
    {
        return $this->hasOne(BusinessSetting::class);
    }
}
