<?php
namespace App\Livewire\ProgramChair;

use App\Models\Repository;
use App\Models\RepositoryDocument;
use App\Models\RepositoryFeedback;
use App\Models\RepositoryGrade;
use App\Models\RepositoryPayment;
use App\Models\StudentRepository;
use App\Models\TeacherRepository;
use Livewire\Component;

class RepositoryView extends Component
{
    public $repository_id;
    public $repository_name;

    public $outline_grade;
    public $final_grade;
    public $outline_modal = false;
    public $final_modal   = false;

    public $feedback;

    public function mount()
    {
        $this->repository_id   = request('id');
        $this->repository_name = Repository::where('id', $this->repository_id)->first()->name;

    }

    public function outlineSubmit()
    {
        RepositoryGrade::create([
            'repository_id'   => $this->repository_id,
            'teacher_id'      => auth()->user()->teacher->id,
            'grade'           => $this->outline_grade,
            'type_of_defense' => 'Outline',
        ]);
        $this->outline_modal = false;
        $this->outline_grade = null;
    }

    public function postFeedback()
    {
        RepositoryFeedback::create([
            'repository_id' => $this->repository_id,
            'user_id'       => auth()->user()->id,
            'feedback'      => $this->feedback,
        ]);
        $this->feedback = null;
    }

    public function finalSubmit()
    {
        RepositoryGrade::create([
            'repository_id'   => $this->repository_id,
            'teacher_id'      => auth()->user()->teacher->id,
            'grade'           => $this->final_grade,
            'type_of_defense' => 'Final',
        ]);
        $this->final_modal = false;
        $this->final_grade = null;
    }
    public function render()
    {
        return view('livewire.program-chair.repository-view', [
            'students'  => StudentRepository::where('repository_id', $this->repository_id)->get(),
            'advisers'  => TeacherRepository::where('repository_id', $this->repository_id)->where('is_adviser', true)->get(),
            'panels'    => TeacherRepository::where('repository_id', $this->repository_id)->where('is_panel', true)->get(),
            'documents' => RepositoryDocument::where('repository_id', $this->repository_id)->orderBy('created_at', 'DESC')->get(),
            'outlines'  => RepositoryGrade::where('type_of_defense', 'Outline')->where('repository_id', $this->repository_id)->get(),
            'finals'    => RepositoryGrade::where('type_of_defense', 'Final')->where('repository_id', $this->repository_id)->get(),
            'payments'  => RepositoryPayment::where('repository_id', $this->repository_id)->orderBy('created_at', 'DESC')->get(),
            'feedbacks' => RepositoryFeedback::where('repository_id', $this->repository_id)->orderByDesc('created_at')->get(),
        ]);
    }
}
