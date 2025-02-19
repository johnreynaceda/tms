<?php

namespace App\Livewire;

use App\Models\College;
use App\Models\Course;
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

class DeanRepository extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Repository::query()->whereIn('course_id', 
            Course::where('college_id', auth()->user()->teacher->college_id)->pluck('id')
        ))->columns([

                TextColumn::make('name')->label('NAME')->searchable(),
                TextColumn::make('schoolYear.year')->label('SCHOOL YEAR')->searchable(),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                Action::make('manage')->label('VIEW')->icon('heroicon-o-viewfinder-circle')->color('warning')->button()->url(fn(Repository $record): string => route('dean.repository-view', $record)),
               

            ])
            ->bulkActions([
                // ...
            ])->emptyStateHeading('No Repository yet')->emptyStateDescription('Once you write your first repository, it will appear here.');
    }



    public function render()
    {
        return view('livewire.dean-repository');
    }
}
