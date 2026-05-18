<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //protected $fillable = ['name','creator'];

    function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
