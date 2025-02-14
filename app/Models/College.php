<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    protected $guarded = [];

    public function courses(){
        return $this->hasMany(Course::class);
    }

    public function teachers(){
        return $this->hasMany(Teachers::class);
    }
}
