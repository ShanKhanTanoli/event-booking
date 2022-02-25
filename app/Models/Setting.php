<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'text_logo',
        'use_text_logo',
        'commission_percentage',
        'currency',

        'mail_host',
        'mail_port',
        'mail_user_name',
        'mail_password',
        'mail_encryption',
        'mail_from_address',
        'mail_from_name',
        
    ];
}
