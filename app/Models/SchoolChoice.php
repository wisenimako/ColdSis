<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolChoice extends Model
{

    protected $fillable = [
        'candidate_gender',
        "choices"
    ];

}
