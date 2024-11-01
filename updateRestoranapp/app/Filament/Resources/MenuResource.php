<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Filament\Resources\MenuResource\RelationManagers;
use App\Models\Menu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama Hidangan')
                    ->required(),
                
                Forms\Components\Select::make('category')
                    ->label('Kategori')
                    ->options([
                        'makanan utama' => 'Makanan Utama',
                        'minuman' => 'Minuman',
                        'makanan penutup' => 'Makanan Penutup',
                    ])
                    ->required(),
                
                Forms\Components\TextInput::make('price')
                    ->label('Harga')
                    ->required()
                    ->numeric(),
                
                Forms\Components\Toggle::make('available')
                    ->label('Ketersediaan')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Hidangan'),
                
                Tables\Columns\TextColumn::make('category')
                    ->label('Kategori'),
                
                Tables\Columns\TextColumn::make('price')
                    ->label('Harga')
                    ->money(), // format sebagai uang
                
                Tables\Columns\BooleanColumn::make('available')
                    ->label('Ketersediaan'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}
