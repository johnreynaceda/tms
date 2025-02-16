<?php
namespace App\Livewire\Student;

use App\Models\RepositoryDocument;
use App\Models\RepositoryFeedback;
use App\Models\StudentRepository;
use App\Models\TeacherRepository;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class MyRepository extends Component implements HasForms
{
    use InteractsWithForms;
    use WithFileUploads;

    public $repository;
    public $add_modal = false;
    public $documents = [];

    public $feedback;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('documents')
                    ->multiple() // Allow multiple file uploads
                    ->required()
                    ->label(''),
            ]);
    }

    public function uploadFile()
    {
        foreach ($this->documents as $file) {
            RepositoryDocument::create([
                'repository_id' => $this->repository->id,
                'name'          => $file->getClientOriginalName(),
                'document_path' => $file->store('documents', 'public'),
            ]);
        }
        $this->documents = [];

        return redirect()->route('student.my-repository');

    }

    public function postFeedback()
    {
        RepositoryFeedback::create([
            'repository_id' => $this->repository->id,
            'user_id'       => auth()->user()->id,
            'feedback'      => $this->feedback,
        ]);
        $this->feedback = null;
        return redirect()->route('student.my-repository');
    }

    public function mount()
    {

    }

    public function deletePost($id){
        RepositoryFeedback::where('id', $id)->delete();
        return redirect()->route('student.my-repository');
    }

    public function addUpload()
    {
        sleep(1);
        $this->add_modal = true;
    }

    public function deleteDocument($id)
    {
        RepositoryDocument::find($id)?->delete();
    }

    public function render()
    {
        $this->repository = StudentRepository::where('student_id', auth()->user()->student->id)->first();
        return view('livewire.student.my-repository', [
            'advisers'   => TeacherRepository::where('repository_id', $this->repository->repository->id)->where('is_adviser', true)->get(),
            'panels'     => TeacherRepository::where('repository_id', $this->repository->repository->id)->where('is_panel', true)->get(),
            'documentss' => RepositoryDocument::where('repository_id', $this->repository->repository->id)->orderBy('created_at', 'DESC')->get(),
            'feedbacks'  => RepositoryFeedback::where('repository_id', $this->repository->repository->id)->orderByDesc('created_at')->paginate(5),

        ]);
    }
}
