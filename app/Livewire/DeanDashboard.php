<?php
namespace App\Livewire;

use App\Models\ProgramChair;
use App\Models\Repository;
use App\Models\Student;
use App\Models\Teachers;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class DeanDashboard extends Component implements HasForms, HasTable
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
            ->query(Repository::query()->where('course_id', $this->course_id))
            ->columns([
                ViewColumn::make('status')->view('filament.tables.users')->label('STUDENTS'),
                TextColumn::make('name')->label('NAME')->formatStateUsing(
                    fn($record) => strtoupper($record->name)
                ),
                TextColumn::make('course.name')->label('COURSE')->formatStateUsing(
                    fn($record) => strtoupper($record->course->name)
                ),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                // ...
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.dean-dashboard', [
            'programchair' => ProgramChair::whereHas('teacher', function ($record) {
                $record->where('college_id', auth()->user()->teacher->college_id);
            })->count(),
            'teacher'      => Teachers::where('college_id', auth()->user()->teacher->college_id)->count(),
            'student'      => Student::where('course_id', $this->course_id)->count(),

        ]);
    }
}
