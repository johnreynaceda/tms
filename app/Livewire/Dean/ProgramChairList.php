<?php

namespace App\Livewire\Dean;

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

class ProgramChairList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public $college_id;

    public function mount(){
        $this->college_id = auth()->user()->teacher->college_id;
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(ProgramChair::query()->whereHas('teacher', function($record){
                $record->where('college_id', $this->college_id);
            }))->headerActions([
                CreateAction::make('program_chair')->label('New Program Chair')->icon('heroicon-o-plus')->color('success')->action(
                    function($data){
                        ProgramChair::create([
                            'course_id' => $data['course_id'],
                            'teachers_id' => $data['teacher_id']
                        ]);
                        $data = Teachers::where('id', $data['teacher_id'])->first();
                        $data->update([
                            'status' => 'program_chair',
                        ]);
                        $data->user->update([
                            'user_type' => 'program_chair'
                        ]);
                    }
                )->form([

                    Select::make('teacher_id')
                    ->label('Teacher')
                    ->options(Teachers::where('status', null)->where('college_id', auth()->user()->teacher->college_id)
                    ->get()
                    ->mapWithKeys(fn($record) => [$record->id => $record->firstname . ' ' . $record->lastname]))
                    , 
                    
                    Select::make('course_id')
                    ->label('Course')
                    ->options(Course::where('college_id', auth()->user()->teacher->college_id)->pluck('name', 'id')),
                ])->modalWidth('xl')
            ])
            ->columns([
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
        return view('livewire.dean.program-chair-list');
    }
}
