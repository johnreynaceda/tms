<?php

namespace App\Livewire\Admin;

use App\Models\College;
use App\Models\Course;
use App\Models\SchoolYear;
use App\Models\Shop\Product;
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

class CourseList extends Component implements HasForms, HasTable
{

    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Course::query())->headerActions([
                CreateAction::make('course')->label('New Course')->icon('heroicon-o-plus')->color('success')->form([
                    TextInput::make('name')->required(),
                    Select::make('college_id')->label('College')->options(College::all()->pluck('name', 'id'))->required()
                ])->modalWidth('xl')
            ])
            ->columns([
                TextColumn::make('name')->label('NAME')->searchable(),
                TextColumn::make('college.name')->label('COLLEGE')->searchable(),
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
            ])->emptyStateHeading('No Course yet')->emptyStateDescription('Once you write your first course, it will appear here.');
    }

    public function render()
    {
        return view('livewire.admin.course-list');
    }
}
