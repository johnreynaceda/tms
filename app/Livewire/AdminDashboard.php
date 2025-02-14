<?php

namespace App\Livewire;

use App\Models\Repository;
use App\Models\StudentRepository;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AdminDashboard extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Repository::query())
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
        return view('livewire.admin-dashboard');
    }
}
