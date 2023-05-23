<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_m_project extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_name',
        'client_id',
        'project_start',
        'project_end',
        'project_status',
    ];
}
