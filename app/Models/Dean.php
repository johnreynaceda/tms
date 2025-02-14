<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dean extends Model
{
    protected $guarded = [];

    public function teacher(){
        return $this->belongsTo(Teachers::class, 'teachers_id');
    }
}
