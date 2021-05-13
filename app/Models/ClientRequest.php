<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientRequest extends Model
{
    use HasFactory;

    protected $dates = ['created_at'];

    protected $fillable = ['email', 'first_name', 'last_name', 'company', 'phone', 'products', 'message','status'];
}
