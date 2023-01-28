<?php

namespace App\Filament\Resources\OrganizationResource\RelationManagers;

use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Component as Livewire;


class UsersRelationManager extends RelationManager
{
    protected static string $relationship = 'admins';

    protected static ?string $recordTitleAttribute = 'name';

    public function mount(): void
    {

    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->options(User::pluck('name','id'))
                    ->searchable()
                    ->label('Felhasználó')
                    ->required(),
                Forms\Components\TextInput::make('organization_id')
                    ->default(function (Livewire $livewire) {
                        $livewire->ownerRecord->id;
                    })


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name'),

            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
