<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdministradorResource\Pages;
use App\Filament\Resources\AdministradorResource\RelationManagers;
use App\Models\Administrador;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdministradorResource extends Resource
{
    protected static ?string $model = Administrador::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModelLabel(): string
    {
        return __('Administrators');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('User');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->label(__('Name'))
                    ->string()
                    ->required(fn($get) => $get('tipo') == 'create')
                    ->placeholder('Gabriel Lucas Silva')
                    ->maxLength(100),
                Forms\Components\TextInput::make('tipo')
                    ->label(__('Type'))
                    ->string()
                    ->required()
                    ->maxLength(90),
                Forms\Components\TextInput::make('email')
                    ->label(__('E-Mail Address'))
                    ->email()
                    ->unique('users','email')//alteração para garantir que os dados sejam salvos na tabela correta no caso users
                    ->required()
                    ->maxLength(255)
                    ->placeholder('email@gmail.com'),
                Forms\Components\TextInput::make('telefone')
                    ->label(__('Phone Number'))
                    ->required(fn($get) => $get('tipo') == 'create')
                    ->maxLength(17)
                    ->placeholder('Formato: 11 11 11111 1111')
                    ->tel()
                    ->telRegex('/^[0-9]{2} [0-9]{2} [0-9]{5}-[0-9]{4}$/'),
                Forms\Components\TextInput::make('password')
                    ->label(__('Password'))
                    ->password()
                    ->required()
                    ->maxLength(255)
                    ->confirmed()
                    ->hiddenOn('edit'),
                Forms\Components\TextInput::make('password')
                    ->label(__('Confirm Password'))
                    ->password()
                    ->required()
                    ->maxLength(255)
                    ->hiddenOn('edit'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->label('ID user')
                    ->numeric()
                    ->sortable()
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('usuario.email')
                    ->label('E-Mail Address')
                    ->translateLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('usuario.telefone')
                    ->label('Phone Number')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created_at')
                    ->translateLabel()
                    ->dateTime('d/m/Y H:i:s')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Updated_at')
                    ->translateLabel()
                    ->dateTime('d/m/Y H:i:s')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAdministradors::route('/'),
            'create' => Pages\CreateAdministrador::route('/create'),
            'edit' => Pages\EditAdministrador::route('/{record}/edit'),
        ];
    }
}
