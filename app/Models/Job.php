<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table = 'job';

    public function company()
    {

        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }
}