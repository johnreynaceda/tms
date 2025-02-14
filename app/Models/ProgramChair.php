<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramChair extends Model
{
    protected $guarded = [];

    public function teacher(){
        return $this->belongsTo(Teachers::class, 'teachers_id');
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }
}
