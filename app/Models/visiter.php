<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visiter extends Model
{
    use HasFactory;
    protected $fillable = ['ip_address', 'user_agent', 'visited_at'];
}
