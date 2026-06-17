<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientResource\Pages;
use App\Models\Client;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ClientResource extends Resource
{
    protected static ?string $model = Client::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationGroup = 'Manajemen';

    protected static ?int $navigationSort = 3;

    protected static ?string $label = 'Client';

    protected static ?string $pluralLabel = 'Clients';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('filename')
                    ->label('Nama File')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Contoh: logo-klien.png'),
                Forms\Components\FileUpload::make('client_logo')
                    ->label('Logo Client')
                    ->image()
                    ->directory('clients')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('client_logo')
                    ->label('Logo')
                    ->size(60)
                    ->placeholder('Tidak ada logo'),
                Tables\Columns\TextColumn::make('filename')
                    ->label('Nama File')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ditambah')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClient::route('/create'),
            'edit' => Pages\EditClient::route('/{record}/edit'),
        ];
    }
}
