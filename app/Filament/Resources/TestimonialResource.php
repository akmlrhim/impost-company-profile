<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Models\Testimonial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static ?string $navigationGroup = 'Konten';

    protected static ?int $navigationSort = 7;

    protected static ?string $label = 'Testimoni';

    protected static ?string $pluralLabel = 'Testimoni';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Nama pemberi testimoni'),
                Forms\Components\TextInput::make('company_name')
                    ->label('Nama Perusahaan')
                    ->maxLength(255)
                    ->placeholder('Nama perusahaan / instansi'),
                Forms\Components\Select::make('media_type')
                    ->label('Tipe Media')
                    ->options([
                        'image' => 'Gambar',
                        'video' => 'Video',
                    ])
                    ->default('image'),
                Forms\Components\FileUpload::make('media_path')
                    ->label('Media (Foto/Video)')
                    ->directory('testimonials'),
                Forms\Components\Textarea::make('content')
                    ->label('Isi Testimoni')
                    ->required()
                    ->placeholder('Tulis isi testimoni di sini...')
                    ->columnSpanFull(),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('media_path')
                    ->label('Media')
                    ->circular()
                    ->size(50)
                    ->placeholder('Tidak ada media'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company_name')
                    ->label('Perusahaan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('content')
                    ->label('Testimoni')
                    ->limit(60),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
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
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
