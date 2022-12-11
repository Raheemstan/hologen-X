<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthRequests extends Model
{
    use HasFactory;
    protected $table = "auth_requests";

    protected $fillable = [
        'phone',
        'otp',
        'api_key',
        'status'
    ];
}
