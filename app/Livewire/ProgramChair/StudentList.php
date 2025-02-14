<?php
namespace App\Livewire\ProgramChair;

use App\Models\Student;
use App\Models\User;
use Filament\Forms\Components\Fieldset;
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

class StudentList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Student::query()->where('course_id', auth()->user()->teacher->programChair->course_id))->headerActions([
            CreateAction::make('student')->label('New Student')->icon('heroicon-o-plus')->action(
                function ($data) {
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
                        'course_id'  => auth()->user()->teacher->programChair->course_id,
                    ]);

                }
            )->form([
                Fieldset::make('STUDENT INFORMATION')->schema([
                    TextInput::make('firstname')->required(),
                    TextInput::make('middlename'),
                    TextInput::make('lastname')->required(),
                    TextInput::make('contact')->numeric()->required(),
                    TextInput::make('email')->email()->required(),
                ]),

            ]),
        ])
            ->columns([
                TextColumn::make('firstname')->label('FULLNAME')->formatStateUsing(
                    fn($record) => $record->firstname . ' ' . $record->lastname
                ),
                TextColumn::make('user.email')->label('EMAIL'),
                TextColumn::make('contact')->label('CONTACT'),
                TextColumn::make('course.name')->label('COURSE'),
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
                    ]),

                ]),
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.program-chair.student-list');
    }
}
