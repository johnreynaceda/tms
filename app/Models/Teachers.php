<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function college()
    {
        return $this->belongsTo(College::class);
    }

    public function dean()
    {
        return $this->hasOne(Dean::class);
    }

    public function programChair()
    {
        return $this->hasOne(ProgramChair::class);
    }

    public function adviserRepository()
    {
        return $this->hasMany(AdviserRepository::class);
    }

    public function repositoryGrades()
    {
        return $this->hasMany(RepositoryGrade::class);
    }
    public function teacherRepositories()
    {
        return $this->hasMany(RepositoryGrade::class);
    }
}
