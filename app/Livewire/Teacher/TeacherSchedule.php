<?php

namespace App\Livewire\Teacher;

use App\Models\RepositorySchedule;
use Carbon\Carbon;
use Livewire\Component;

class TeacherSchedule extends Component
{
    public $events = [];

    public function mount()
    {
        $this->events = RepositorySchedule::whereHas('repository', function($record) {
            $record->whereHas('teacherRepositories', function($repo) {
                $repo->where('teachers_id', auth()->user()->teacher->id);
            });
        })->get()->map(
            function($event){
                return [
                    'id' => $event->id,
                    'title' => 'ROOM '. $event->room_number,
                    // 'description' => Carbon::parse($event->start_time)->format('h:i A'). ' - '. Carbon::parse($event->end_time)->format('h:i A'),
                    'extendedProps' => ['description' => Carbon::parse($event->start_time)->format('h:i A'). ' - '. Carbon::parse($event->end_time)->format('h:i A')],
                    'start' => $event->scheduled_date,
                    'end' => $event->scheduled_date,
                ];
            }
        );


    }

    public function render()
    {
        return view('livewire.teacher.teacher-schedule',[
            'eventss' => RepositorySchedule::whereHas('repository', function($record) {
                $record->whereHas('teacherRepositories', function($repo) {
                    $repo->where('teachers_id', auth()->user()->teacher->id);
                });
            })->get(),
        ]);
    }
}
