<?php

namespace App\Livewire\Admin;

use App\Models\College;
use App\Models\Course;
use App\Models\Dean;
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

class DeanList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;


    public function table(Table $table): Table
    {
        return $table
            ->query(Dean::query())->headerActions([
                CreateAction::make('dean')->label('New Dean')->icon('heroicon-o-plus')->color('success')->action(
                    function($data){
                        Dean::create([
                            'college_id' => $data['college_id'],
                            'teachers_id' => $data['teacher_id']
                        ]);
                        $data = Teachers::where('id', $data['teacher_id'])->first();
                        $data->update([
                            'status' => 'dean',
                        ]);
                        $data->user->update([
                            'user_type' => 'dean'
                        ]);
                    }
                )->form([
                    Select::make('college_id')
                    ->label('College')
                    ->options(College::all()->pluck('name', 'id'))
                    ->reactive() // Make this reactive
                    ->afterStateUpdated(fn ($state, callable $set) => 
                        $set('teacher_id', null) // Reset teacher_id when college_id changes
                    ),
        
                Select::make('teacher_id')
                    ->label('Teacher')
                    ->options(function (callable $get) {
                        $collegeId = $get('college_id');
                        return $collegeId 
                            ? Teachers::where('college_id', $collegeId)
                                ->where('status', null)
                                ->get()
                                ->mapWithKeys(fn($record) => [$record->id => $record->firstname . ' ' . $record->lastname])
                            : [];
                    })
                    ->reactive(), 
                ])->modalWidth('xl')
            ])
            ->columns([
                TextColumn::make('teachers_id')->label('FULLNAME')->formatStateUsing(
                    fn($record) => $record->teacher->firstname. ' ' . $record->teacher->lastname
                )->searchable(),
                TextColumn::make('teacher.college.name')->label('COLLEGE')->searchable(),
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
            ])->emptyStateHeading('No Dean yet')->emptyStateDescription('Once you write your first dean, it will appear here.');
    }

    public function render()
    {
        return view('livewire.admin.dean-list');
    }
}
