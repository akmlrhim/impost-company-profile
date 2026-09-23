<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    // protected static ?string $navigationIcon = 'heroicon-o-users';

    // protected static ?string $navigationGroup = 'Manajemen';

    // protected static ?int $navigationSort = 1;

    protected static ?string $label = 'Karyawan';

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    protected static ?string $pluralLabel = 'Karyawan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Data Karyawan')
                    ->schema([
                        Forms\Components\TextInput::make('fullname')
                            ->label('Nama Lengkap')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Nama lengkap karyawan')
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('slug', Str::slug($state))),
                        Forms\Components\Hidden::make('slug'),
                        Forms\Components\TextInput::make('employee_id')
                            ->label('ID Karyawan')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: EMP001'),
                        Forms\Components\TextInput::make('position')
                            ->label('Posisi / Jabatan')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Web Developer'),
                        Forms\Components\DatePicker::make('join_date')
                            ->label('Tanggal Bergabung')
                            ->required(),
                    ])->columns(2),

                Forms\Components\Section::make('Foto & QR')
                    ->schema([
                        Forms\Components\FileUpload::make('photo')
                            ->label('Foto')
                            ->image()
                            ->directory('employees'),
                        Forms\Components\TextInput::make('qr_code_id')
                            ->label('QR Code ID')
                            ->maxLength(255)
                            ->placeholder('ID untuk QR Code'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo')
                    ->label('Foto')
                    ->circular()
                    ->size(50)
                    ->placeholder('Tidak ada foto'),
                Tables\Columns\TextColumn::make('fullname')
                    ->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('employee_id')
                    ->label('ID')
                    ->searchable(),
                Tables\Columns\TextColumn::make('position')
                    ->label('Posisi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('join_date')
                    ->label('Bergabung')
                    ->date('d M Y')
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
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
