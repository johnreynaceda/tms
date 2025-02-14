<?php

namespace App\Livewire\Admin;

use App\Models\College;
use App\Models\Course;
use App\Models\Dean;
use App\Models\ProgramChair;
use App\Models\SchoolYear;
use App\Models\Shop\Product;
use App\Models\Teachers;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AdminProgramChair extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(ProgramChair::query())->columns([
                TextColumn::make('teachers_id')->label('FULLNAME')->formatStateUsing(
                    fn($record) => $record->teacher->firstname. ' ' . $record->teacher->lastname
                )->searchable(),
                TextColumn::make('course.name')->label('COURSE')->searchable(),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make('edit')->color('success')->form([
                    TextInput::make('name')->required(),
                    Select::make('college_id')->label('College')->options(College::all()->pluck('name', 'id'))
                ])->modalWidth('xl'),
                DeleteAction::make('delete')
            ])
            ->bulkActions([
                // ...
            ])->emptyStateHeading('No Program Chair yet')->emptyStateDescription('Once you write your first program chair, it will appear here.');
    }

    public function render()
    {
        return view('livewire.admin.admin-program-chair');
    }
}
