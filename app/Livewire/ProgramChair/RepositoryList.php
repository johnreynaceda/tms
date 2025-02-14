<?php
namespace App\Livewire\ProgramChair;

use App\Models\Repository;
use App\Models\RepositorySchedule;
use App\Models\SchoolYear;
use App\Models\Student;
use App\Models\StudentRepository;
use App\Models\TeacherRepository;
use App\Models\Teachers;
use App\Models\User;
use App\Notifications\ScheduleNotification;
use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class RepositoryList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Repository::query()->where('course_id', auth()->user()->teacher->programChair->course_id))->headerActions([
            CreateAction::make('repository')->label('New Repository')->icon('heroicon-o-plus')->action(
                function ($data) {
                    Repository::create([
                        'name'           => $data['name'],
                        'school_year_id' => $data['school_year_id'],
                        'course_id'      => auth()->user()->teacher->programChair->course_id,
                    ]);
                }
            )->form([
                Textarea::make('name')->required(),
                Select::make('school_year_id')->label('School Year')->options(SchoolYear::all()->pluck('year', 'id')),
            ])->modalWidth('xl'),
        ])
            ->columns([

                TextColumn::make('name')->label('NAME'),
                TextColumn::make('schoolYear.year')->label('SCHOOL YEAR'),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                Action::make('manage')->label('VIEW')->icon('heroicon-o-viewfinder-circle')->color('warning')->button()->url(fn(Repository $record): string => route('program_chair.repository-view', $record)),
                ActionGroup::make([
                    Action::make('student')->label('Assign Student')->icon('heroicon-o-plus')->color('success')->action(
                        function ($record, $data) {
                            foreach ($data['student_id'] as $key => $value) {
                                StudentRepository::create([
                                    'repository_id' => $record->id,
                                    'student_id'    => $value,
                                ]);
                            }
                        }
                    )->form([
                        Select::make('student_id')
                            ->label('Student')
                            ->options(function ($record) {
                                // Fetch the IDs of students already selected or used from the repository
                                $selectedStudentIds = StudentRepository::pluck('student_id')->toArray();

                                // Get students filtered by course and excluding those already selected
                                return Student::where('course_id', auth()->user()->teacher->programChair->course_id)
                                    ->whereNotIn('id', $selectedStudentIds) // Make sure to use the correct column here
                                    ->get()
                                    ->mapWithKeys(function ($student) {
                                        // Return an array with student_id as the key and full name as the value
                                        return [$student->id => $student->firstname . ' ' . $student->lastname];
                                    });
                            })
                            ->multiple()
                            ->required(),
                    ])->modalWidth('xl'),
                    Action::make('adviser')->label('Assign Adviser')->icon('heroicon-o-plus')->color('success')->action(
                        function ($record, $data) {
                            foreach ($data['teacher_id'] as $key => $value) {
                                TeacherRepository::create([
                                    'repository_id' => $record->id,
                                    'teachers_id'   => $value,
                                    'is_adviser'    => true,
                                ]);
                            }
                        }
                    )->form([
                        Select::make('teacher_id')->label('Teacher')->options(Teachers::where('status', null)->where('college_id', auth()->user()->teacher->college_id)->get()->mapWithKeys(function ($record) {
                            return [$record->id => $record->firstname . ' ' . $record->lastname];
                        }))->multiple()->required(),
                    ])->modalWidth('xl'),
                    Action::make('panel')->label('Assign Panelist')->icon('heroicon-o-plus')->color('success')->action(
                        function ($record, $data) {
                            foreach ($data['teacher_id'] as $key => $value) {
                                TeacherRepository::create([
                                    'repository_id' => $record->id,
                                    'teachers_id'   => $value,
                                    'is_panel'      => true,
                                ]);
                            }
                        }
                    )->form([
                        Select::make('teacher_id')
                            ->label('Teacher')
                            ->options(function ($record) {
                                $excludedTeacherIds = TeacherRepository::where('repository_id', $record->id)
                                    ->pluck('teachers_id')
                                    ->toArray();

                                return Teachers::whereNotIn('id', $excludedTeacherIds)
                                    ->where('status', null)
                                    ->where('college_id', auth()->user()->teacher->college_id)
                                    ->get()
                                    ->mapWithKeys(function ($teacher) {
                                        return [$teacher->id => $teacher->firstname . ' ' . $teacher->lastname];
                                    });
                            })
                            ->multiple()
                            ->required(),
                    ])->modalWidth('xl'),
                    Action::make('schedule')->label('Set Schedule')->action(
                        function ($record, $data) {

                            $teachers = Teachers::whereIn('id', $record->teacherRepositories->pluck('teachers_id')->toArray())->get();

                            $repo = RepositorySchedule::create([
                                'repository_id'  => $record->id,
                                'room_number'    => $data['room'],
                                'scheduled_date' => Carbon::parse($data['scheduled_date']),
                                'start_time'     => Carbon::parse($data['start']),
                                'end_time'       => Carbon::parse($data['end']),
                            ]);
                            $repo_name = $record->name;
                            $date_time = Carbon::parse($data['scheduled_date'])->format('F d, Y') . ' ' . Carbon::parse($data['start'])->format('h:i A') . ' - ' . Carbon::parse($data['end'])->format('h:i A');
                            $students  = $record->StudentRepositories->map(function ($student) {
                                return $student->student->firstname . ' ' . $student->student->lastname;
                            })->toArray();

                            foreach ($teachers as $teacher) {
                                $teacher->user->notify(new ScheduleNotification($repo_name, $students, $date_time));
                            }
                        }
                    )->form([
                        Grid::make(2)->schema([
                            TextInput::make('room')->required(),
                            DatePicker::make('scheduled_date')->required(),
                            TimePicker::make('start')->required(),
                            TimePicker::make('end')->required(),
                        ]),
                    ])->modalWidth('xl'),
                    EditAction::make('edit')->color('success'),

                ]),

            ])
            ->bulkActions([
                // ...
            ])->emptyStateHeading('No Repository yet')->emptyStateDescription('Once you write your first repository, it will appear here.');
    }

    public function render()
    {
        return view('livewire.program-chair.repository-list');
    }
}
