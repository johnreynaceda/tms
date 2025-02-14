<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RepositorySchedule extends Model
{
    protected $guarded = [];

    public function repository(){
        return $this->belongsTo(Repository::class);
    }
}
