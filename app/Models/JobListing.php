<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobListing extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'company_name', 'location', 'experience', 'salary_range', 'tags', 'description', 'technologies', 'company_logo'];
}