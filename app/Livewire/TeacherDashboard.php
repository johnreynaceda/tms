<?php
namespace App\Livewire;

use App\Models\RepositorySchedule;
use App\Models\TeacherRepository;
use Livewire\Component;

class TeacherDashboard extends Component
{
    public function render()
    {
        return view('livewire.teacher-dashboard', [
            'repository' => TeacherRepository::where('teachers_id', auth()->user()->teacher->id)->count(),
            'schedules'  => RepositorySchedule::whereHas('repository', function ($query) {
                $query->whereHas('teacherRepositories', function ($query) {
                    $query->where('teachers_id', auth()->user()->teacher->id);
                });
            })->count(),
        ]);
    }
}
