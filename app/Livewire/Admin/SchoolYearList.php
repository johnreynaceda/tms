<?php

namespace App\Livewire\Admin;

use App\Models\SchoolYear;
use App\Models\Shop\Product;
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

class SchoolYearList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;


    public function table(Table $table): Table
    {
        return $table
            ->query(SchoolYear::query())->headerActions([
                CreateAction::make('school_year')->label('New School Year')->icon('heroicon-o-plus')->color('success')->form([
                    TextInput::make('year')->required(),
                ])->modalWidth('xl')
            ])
            ->columns([
                TextColumn::make('year')->label('YEAR')->searchable(),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make('edit')->color('success')->form([
                    TextInput::make('year')->required(),
                ])->modalWidth('xl'),
                DeleteAction::make('delete')
            ])
            ->bulkActions([
                // ...
            ])->emptyStateHeading('No School Year yet')->emptyStateDescription('Once you write your first school year, it will appear here.');
    }

    public function render()
    {
        return view('livewire.admin.school-year-list');
    }
}
