<?php
namespace App\Livewire\Dean;

use App\Models\Course;
use App\Models\ProgramChair;
use App\Models\Student;
use App\Models\User;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class DeanStudent extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public $course_id;

    public function mount()
    {
        $this->course_id = ProgramChair::whereHas('teacher', function ($record) {
            $record->where('college_id', auth()->user()->teacher->college_id);
        })->first()->course_id ?? [];
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Student::query()->where('course_id', $this->course_id))->headerActions([
                CreateAction::make('student')->label('New Student')->icon('heroicon-o-plus')->form([
                    Fieldset::make('STUDENT INFORMATION')->schema([
                        TextInput::make('firstname')->required(),
                        TextInput::make('middlename'),
                        TextInput::make('lastname')->required(),
                        TextInput::make('contact')->numeric()->required(),
                        TextInput::make('email')->email()->required(),
                        Select::make('course_id')->label('Course')->options(Course::where('college_id', auth()->user()->teacher->college_id)->pluck('name', 'id'))
                    ]),
                ])->modalWidth('xl')->action(
                    function($data){
                        $user = User::create([
                            'name'      => $data['firstname'] . ' ' . $data['lastname'],
                            'email'     => $data['email'],
                            'password'  => bcrypt('password'),
                            'user_type' => 'student',
                        ]);
    
                        Student::create([
                            'firstname'  => $data['firstname'],
                            'lastname'   => $data['lastname'],
                            'middlename' => $data['middlename'],
                            'contact'    => $data['contact'],
                            'user_id'    => $user->id,
                            'course_id'  => $data['course_id'],
                        ]);
                    }
                )
            ])->columns([
            TextColumn::make('firstname')->label('FULLNAME')->formatStateUsing(
                fn($record) => $record->firstname . ' ' . $record->lastname
            )->searchable(['firstname', 'lastname']),
            TextColumn::make('user.email')->label('EMAIL')->searchable(),
            TextColumn::make('contact')->label('CONTACT')->searchable(),
            TextColumn::make('course.name')->label('COURSE')->searchable(),
        ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make('edit')->color('success')->form([
                    Fieldset::make('STUDENT INFORMATION')->schema([
                        TextInput::make('firstname')->required(),
                        TextInput::make('middlename'),
                        TextInput::make('lastname')->required(),
                        TextInput::make('contact')->numeric()->required(),
                        Select::make('course_id')->label('Course')->options(Course::where('college_id', auth()->user()->teacher->college_id)->pluck('name', 'id'))
                    ]),
                ])
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.dean.dean-student');
    }
}
