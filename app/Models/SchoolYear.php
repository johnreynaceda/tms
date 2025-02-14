<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    protected $guarded = [];

    public function repositories(){
        return $this->hasMany(Repository::class);
    }
}
