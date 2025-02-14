<?php

namespace App\Livewire;

use App\Models\RepositoryDocument;
use App\Models\RepositoryPayment;
use App\Models\StudentRepository;
use App\Models\TeacherRepository;
use Filament\Forms\Components\FileUpload;
use Livewire\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\WithFileUploads;

class UploadPayment extends Component implements HasForms
{
    use InteractsWithForms;
    use WithFileUploads;

    public $repository;
    public $documents = [];

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('documents')
                    ->multiple()  // Allow multiple file uploads
                    ->required()
                    ->label('')
            ]);
    }

    public function uploadFile()
    {
        foreach ($this->documents as $file) {
            RepositoryPayment::create([
                'repository_id' => $this->repository->id,
                'name' => $file->getClientOriginalName(),
                'document_path' => $file->store('documents', 'public'),
            ]);
        }
        $this->documents = [];

        return redirect()->route('student.my-repository');
       
    }

    public function deleteDocument($id)
    {
        RepositoryPayment::find($id)?->delete();
    }

    public function render()
    {
        $this->repository = StudentRepository::where('student_id', auth()->user()->student->id)->first();
        return view('livewire.upload-payment',[
            'documentss' => RepositoryPayment::where('repository_id', $this->repository->id)->orderBy('created_at', 'DESC')->get(),
        ]);
    }
}
