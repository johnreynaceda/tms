<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdviserRepository extends Model
{
    protected $guarded = [];

    public function teacher(){
        return $this->belongsTo(Teachers::class, 'teachers_id');
    }

    public function repository(){
        return $this->belongsTo(Repository::class);
    }
}
