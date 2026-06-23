<?php

namespace App\Models;

use Illuminate\Console\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable([
    'name', 
    'location', 
    'documentation', 
    'owner', 
    'architect', 
    'longitude', 
    'latitude', 
    'progress_project', 
    'status',
    'password'
])]

#[Hidden([
    'password'
])]
class Project extends Model
{
    //
}
