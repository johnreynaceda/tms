<?php

namespace App\Livewire;

use App\Models\Repository;
use App\Models\RepositorySchedule;
use App\Models\Student;
use Carbon\Carbon;
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

class ProgramChairDashboard extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(RepositorySchedule::query())->columns([
                TextColumn::make('repository.course.name')->label('COURSE')->searchable(),
                TextColumn::make('room_number')->label('ROOM #')->searchable(),
                TextColumn::make('id')->label('TIME')->formatStateUsing(
                    fn($record) => Carbon::parse($record->start_time)->format('F d, Y h:i A'). ' - ' . Carbon::parse($record->end_time)->format('h:i A')
                )->searchable(),
                
            ])
            ->filters([
                // ...
            ])
            ->actions([
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.program-chair-dashboard',[
            'student' => Student::where('course_id', auth()->user()->teacher->programChair->course_id)->count(),
            'repository' => Repository::where('course_id', auth()->user()->teacher->programChair->course_id)->count(),
        ]);
    }
}
