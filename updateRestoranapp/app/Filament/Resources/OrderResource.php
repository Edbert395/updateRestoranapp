<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Menu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('customer_id')
                    ->label('Pelanggan')
                    ->options(Customer::pluck('name', 'id'))
                    ->required(),
            
                Forms\Components\Select::make('menu_id')
                    ->label('Menu')
                    ->options(Menu::pluck('name', 'id'))
                    ->required(),
                
                Forms\Components\TextInput::make('quantity')
                    ->label('Jumlah')
                    ->required()
                    ->numeric(),
                
                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'sedang disiapkan' => 'Sedang Disiapkan',
                        'siap diantar' => 'Siap Diantar',
                        'selesai' => 'Selesai',
                    ])
                    ->default('sedang disiapkan')
                    ->required(),
                
                Forms\Components\DateTimePicker::make('order_date')
                    ->label('Tanggal Pesanan')
                    ->default(now())
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('customer.name')
                    ->label('Pelanggan'),
                
                Tables\Columns\TextColumn::make('menu.name')
                    ->label('Menu'),
                
                Tables\Columns\TextColumn::make('quantity')
                    ->label('Jumlah'),
                
                Tables\Columns\TextColumn::make('status')
                    ->label('Status'),
                
                Tables\Columns\TextColumn::make('order_date')
                    ->label('Tanggal Pesanan')
                    ->dateTime(),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
