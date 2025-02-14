<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RepositoryGrade extends Model
{
    protected $guarded = [];

    public function teacher(){
        return $this->belongsTo(Teachers::class, 'teacher_id');
    }
}
