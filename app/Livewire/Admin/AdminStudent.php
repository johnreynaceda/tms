<?php

namespace App\Livewire\Admin;

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

class AdminStudent extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    
    public function table(Table $table): Table
    {
        return $table
            ->query(Student::query())->columns([
                TextColumn::make('firstname')->label('FULLNAME')->formatStateUsing(
                    fn($record) => $record->firstname. ' ' .$record->lastname
                )->searchable(['firstname', 'lastname']),
                TextColumn::make('user.email')->label('EMAIL')->searchable(),
                TextColumn::make('contact')->label('CONTACT')->searchable(),
                TextColumn::make('course.name')->label('COURSE')->searchable(),
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
        return view('livewire.admin.admin-student');
    }
}
