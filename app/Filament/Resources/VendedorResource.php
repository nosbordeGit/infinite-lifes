<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VendedorResource\Pages;
use App\Filament\Resources\VendedorResource\RelationManagers;
use App\Models\Vendedor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VendedorResource extends Resource
{
    protected static ?string $model = Vendedor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModelLabel(): string
    {
        return __('Vendors');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('User');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('empresa')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('cnpj')
                    ->required()
                    ->maxLength(19),
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
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
                Tables\Columns\TextColumn::make('empresa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cnpj')
                    ->searchable(),
                Tables\Columns\TextColumn::make('usuario.email')
                    ->label('E-Mail Address')
                    ->translateLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('usuario.telefone')
                    ->label('Phone Number')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
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
            'index' => Pages\ListVendedors::route('/'),
            'create' => Pages\CreateVendedor::route('/create'),
            'edit' => Pages\EditVendedor::route('/{record}/edit'),
        ];
    }
}
