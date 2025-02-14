<?php

namespace App\Livewire;

use App\Models\Repository;
use App\Models\SchoolYear;
use App\Models\Student;
use App\Models\StudentRepository;
use App\Models\TeacherRepository;
use App\Models\Teachers;
use App\Models\User;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
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

class TeacherRepositoryList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(TeacherRepository::query()->where('teachers_id', auth()->user()->teacher->id))
            ->columns([
                TextColumn::make('repository.name')->label('NAME'),
                TextColumn::make('repository.name')->label('NAME'),
                TextColumn::make('repository.schoolYear.year')->label('SCHOOL YEAR'),
            ])
            ->filters([
                // ...
            ])
            ->actions([
               Action::make('view')->label('VIEW REPOSITORY')->button()->icon('heroicon-o-eye')->url(fn (TeacherRepository $record): string => route('teacher.repository-view', $record->repository_id))
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.teacher-repository-list');
    }
}
