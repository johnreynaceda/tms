<?php

namespace App\Livewire\Admin;

use App\Models\College;
use App\Models\SchoolYear;
use App\Models\Shop\Product;
use App\Models\Teachers;
use App\Models\User;
use Filament\Forms\Components\Fieldset;
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

class TeacherList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Teachers::query())->headerActions([
                CreateAction::make('teacher')->label('New Teacher')->icon('heroicon-o-plus')->color('success')->action(
                    function($data){
                            $user = User::create([
                                'name' => $data['firstname'].' '.$data['lastname'],
                                'email' => $data['email'],
                                'password' => bcrypt($data['password']),
                                'user_type' => 'teacher'
                            ]);

                            Teachers::create([
                                'firstname' => $data['firstname'],
                                'lastname' => $data['lastname'],
                                'middlename' => $data['middlename'],
                                'contact' => $data['contact'],
                                'college_id' => $data['college_id'],
                                'user_id' => $user->id,
                            ]);

                    }
                )->form([
                    Fieldset::make('PERSONAL INFORMATION')->schema([
                        TextInput::make('firstname')->required(),
                        TextInput::make('middlename'),
                        TextInput::make('lastname')->required(),
                        TextInput::make('contact')->required(),
                        Select::make('college_id')->label('College')->options(College::all()->pluck('name', 'id'))
                    ]),
                    Fieldset::make('ACCOUNT')->schema([
                        TextInput::make('email')->email()->required(),
                        TextInput::make('password')->password()->required(),
                    ])
                ])->modalWidth('2xl')
            ])
            ->columns([
                TextColumn::make('id')->label('FULLNAME')->searchable()->formatStateUsing(
                    fn($record) => $record->firstname .  ' ' . $record->lastname
                ),
                TextColumn::make('user.email')->label('EMAIL')->searchable(),
                TextColumn::make('contact')->label('CONTACT')->searchable(),
                TextColumn::make('college.name')->label('COLLEGE')->searchable(),
                
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make('edit')->color('success')->form([
                    TextInput::make('name')->required(),
                ])->modalWidth('xl'),
                DeleteAction::make('delete')
            ])
            ->bulkActions([
                // ...
            ])->emptyStateHeading('No Teachers yet')->emptyStateDescription('Once you write your first teacher, it will appear here.');
    }
    
    public function render()
    {
        return view('livewire.admin.teacher-list');
    }
}
