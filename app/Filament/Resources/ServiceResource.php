<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationGroup = 'Konten';

    protected static ?int $navigationSort = 5;

    protected static ?string $label = 'Layanan';

    protected static ?string $pluralLabel = 'Layanan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('service_name')
                    ->label('Nama Layanan')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Nama layanan yang ditawarkan')
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('slug', Str::slug($state))),
                Forms\Components\Hidden::make('slug'),
                Forms\Components\TextInput::make('category')
                    ->label('Kategori')
                    ->maxLength(255)
                    ->placeholder('Contoh: Web Design, Branding'),
                Forms\Components\TextInput::make('sort')
                    ->label('Urutan')
                    ->numeric()
                    ->default(0),
                Forms\Components\FileUpload::make('cover_path')
                    ->label('Cover')
                    ->image()
                    ->directory('services')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('description')
                    ->label('Deskripsi')
                    ->required()
                    ->columnSpanFull(),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover_path')
                    ->label('Cover')
                    ->size(60)
                    ->placeholder('Tidak ada cover'),
                Tables\Columns\TextColumn::make('service_name')
                    ->label('Layanan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category')
                    ->label('Kategori')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sort')
                    ->label('Urutan')
                    ->numeric()
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort', 'asc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
