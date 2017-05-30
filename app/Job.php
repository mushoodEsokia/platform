<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Job extends Model
{
    use Searchable;
    
    protected $fillable = ['title','description','opening'];
}
