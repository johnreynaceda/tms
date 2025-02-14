<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    protected $guarded = [];

    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function schoolYear(){
        return $this->belongsTo(SchoolYear::class);
    }

    public function studentRepositories(){
        return $this->hasMany(StudentRepository::class);
    }

    public function adviserRepositories(){
        return $this->hasMany(AdviserRepository::class);
    }

    public function teacherRepositories(){
        return $this->hasMany(TeacherRepository::class);
    }

    public function repositorySchedules(){
        return $this->hasMany(RepositorySchedule::class);
    }
}
