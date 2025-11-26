<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    // Allow these fields to be mass assignable
    protected $fillable = [
        'name',
        'code',
        'description',
        'specialization',
    ];
}
