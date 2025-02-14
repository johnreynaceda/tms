<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];

    public function repositories(){
        return $this->hasMany(Repository::class);
    }
    public function college(){
        return $this->belongsTo(College::class);
    }

    public function programChair(){
        return $this->hasOne(ProgramChair::class);
    }

    public function students(){
        return $this->hasMany(Student::class);
    }
}
