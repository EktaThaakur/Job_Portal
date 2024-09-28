<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class application extends Model
{
    use HasFactory;
    protected $table = 'job_applications';
    protected $fillable = [
        'name',
        'email',
        'job_role',
        'resume',
        'cover_letter',
    ];
}