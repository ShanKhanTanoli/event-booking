<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BusinessSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'logo', 'text_logo', 'use_text_logo',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
