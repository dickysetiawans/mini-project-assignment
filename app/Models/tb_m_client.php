<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_m_client extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_name',
        'client_address',
    ];
}
