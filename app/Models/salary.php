<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salary extends Model
{
    use HasFactory;
    protected $fillable = [
        'employ_name',
        'employ_salary',
        'data',
        'employ_id',
    ];
}
