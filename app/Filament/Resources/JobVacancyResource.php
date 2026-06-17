<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JobVacancyResource\Pages;
use App\Models\JobVacancy;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class JobVacancyResource extends Resource
{
    protected static ?string $model = JobVacancy::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationGroup = 'Manajemen';

    protected static ?int $navigationSort = 2;

    protected static ?string $label = 'Lowongan Kerja';

    protected static ?string $pluralLabel = 'Lowongan Kerja';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Lowongan')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Posisi')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Frontend Developer')
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('slug', Str::slug($state))),
                        Forms\Components\Hidden::make('slug'),
                        Forms\Components\Select::make('employment_type')
                            ->label('Tipe Pekerjaan')
                            ->options([
                                'full-time' => 'Full Time',
                                'part-time' => 'Part Time',
                                'internship' => 'Internship',
                                'freelance' => 'Freelance',
                            ])
                            ->required(),
                        Forms\Components\CheckboxList::make('work_arrangements')
                            ->label('Pengaturan Kerja')
                            ->options([
                                'remote' => 'Remote',
                                'onsite' => 'On-site',
                                'hybrid' => 'Hybrid',
                            ]),
                        Forms\Components\TextInput::make('duration')
                            ->label('Durasi')
                            ->maxLength(255)
                            ->placeholder('Contoh: 3 bulan / Tidak ditentukan'),
                        Forms\Components\Select::make('status')
                            ->options([
                                'open' => 'Open',
                                'closed' => 'Closed',
                            ])
                            ->required()
                            ->default('open'),
                    ])->columns(2),

                Forms\Components\Section::make('Kontak & Media')
                    ->schema([
                        Forms\Components\TextInput::make('apply_email')
                            ->label('Email Apply')
                            ->email()
                            ->maxLength(255)
                            ->placeholder('email@perusahaan.com'),
                        Forms\Components\TextInput::make('apply_subject')
                            ->label('Subject Email')
                            ->maxLength(255)
                            ->placeholder('Contoh: Lamaran - Frontend Developer'),
                        Forms\Components\FileUpload::make('poster')
                            ->label('Poster')
                            ->image()
                            ->directory('job-vacancies'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('poster')
                    ->label('Poster')
                    ->size(60)
                    ->placeholder('Tidak ada poster'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Posisi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('employment_type')
                    ->label('Tipe')
                    ->badge(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'open' => 'success',
                        'closed' => 'danger',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'open' => 'Open',
                        'closed' => 'Closed',
                    ]),
                Tables\Filters\SelectFilter::make('employment_type')
                    ->label('Tipe')
                    ->options([
                        'full-time' => 'Full Time',
                        'part-time' => 'Part Time',
                        'internship' => 'Internship',
                        'freelance' => 'Freelance',
                    ]),
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
            'index' => Pages\ListJobVacancies::route('/'),
            'create' => Pages\CreateJobVacancy::route('/create'),
            'edit' => Pages\EditJobVacancy::route('/{record}/edit'),
        ];
    }
}
