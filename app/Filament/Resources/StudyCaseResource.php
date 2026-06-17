<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudyCaseResource\Pages;
use App\Models\StudyCase;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class StudyCaseResource extends Resource
{
    protected static ?string $model = StudyCase::class;

    protected static ?string $navigationIcon = 'heroicon-o-light-bulb';

    protected static ?string $navigationGroup = 'Konten';

    protected static ?int $navigationSort = 6;

    protected static ?string $label = 'Study Case';

    protected static ?string $pluralLabel = 'Study Cases';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Project')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Nama project')
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('slug', Str::slug($state))),
                        Forms\Components\Hidden::make('slug'),
                        Forms\Components\TextInput::make('category')
                            ->label('Kategori')
                            ->maxLength(255)
                            ->placeholder('Contoh: Website, Branding, dll'),
                        Forms\Components\FileUpload::make('cover_path')
                            ->label('Cover')
                            ->image()
                            ->directory('study-cases'),
                    ])->columns(2),

                Forms\Components\Section::make('Detail Case')
                    ->schema([
                        Forms\Components\RichEditor::make('situation')
                            ->label('Situasi')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\RichEditor::make('solution')
                            ->label('Solusi')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\RichEditor::make('result')
                            ->label('Hasil')
                            ->required()
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover_path')
                    ->label('Cover')
                    ->size(60)
                    ->placeholder('Tidak ada cover'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Project')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category')
                    ->label('Kategori')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
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
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudyCases::route('/'),
            'create' => Pages\CreateStudyCase::route('/create'),
            'edit' => Pages\EditStudyCase::route('/{record}/edit'),
        ];
    }
}
