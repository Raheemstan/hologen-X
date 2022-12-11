<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceApp extends Model
{
    use HasFactory;
    protected $table = "service_apps";
    protected $primaryKey = "api_key";
    protected $fillable = [
        'api_key',
        'callback_urls',
        'status',
    ];
}
