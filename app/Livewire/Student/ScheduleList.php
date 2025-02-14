<?php

namespace App\Livewire\Student;

use App\Models\Repository;
use App\Models\RepositorySchedule;
use Carbon\Carbon;
use Livewire\Component;

class ScheduleList extends Component
{
    public $events = [];
    public $teacher_id;

    public function mount()
    {
        $this->events = RepositorySchedule::whereHas('repository', function($record) {
            $record->whereHas('studentRepositories', function($repo) {
                $repo->where('student_id', auth()->user()->student->id);
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
        return view('livewire.student.schedule-list',[
            'eventss' => RepositorySchedule::whereHas('repository', function($record) {
                $record->whereHas('studentRepositories', function($repo) {
                    $repo->where('student_id', auth()->user()->student->id);
                });
            })->get(),
        ]);
    }
}
