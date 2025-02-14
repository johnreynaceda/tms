<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentRepository extends Model
{
    protected $guarded = [];

    public function repository(){
        return $this->belongsTo(Repository::class);
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }
}
