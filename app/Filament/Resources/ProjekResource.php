<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjekResource\Pages;
use App\Filament\Resources\ProjekResource\RelationManagers;
use App\Models\Projek;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjekResource extends Resource
{
    protected static ?string $model = Projek::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Projek';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->label('Nama Projek')
                    ->columnSpan(2), // Ensure the input spans a reasonable width on the form

                Forms\Components\Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->rows(4)
                    ->columnSpan(2), // Spans across the form for better space management

                Forms\Components\FileUpload::make('foto')
                    ->image()
                    ->required()
                    ->label('Foto Projek')
                    ->disk('public')  // Optional: specify a disk if needed
                    ->columnSpan(2), // File upload area can also span across

                Forms\Components\Select::make('kategori_id')
                    ->label('Kategori')
                    ->relationship('kategori', 'nama')
                    ->required()
                    ->placeholder('Pilih Kategori')
                    ->columnSpan(2),  // Consistent with the other fields for a clean layout
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Projek')
                    ->sortable(),  // Allows sorting by 'nama'

                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(50),  // Limit description length for neat display

                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto Projek')
                    ->disk('public')  // Ensure you specify the disk if needed
                    ->circular()
                    ->width(100)  // Adjust image display width
                    ->height(100), // Adjust image display height

                Tables\Columns\TextColumn::make('kategori.nama')
                    ->label('Kategori')
                    ->sortable()  // Sortable by 'kategori'
                    ->searchable(),  // Makes the 'kategori' searchable in the table
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kategori')
                    ->relationship('kategori', 'nama')
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
            // Add any relations if needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjeks::route('/'),
            'create' => Pages\CreateProjek::route('/create'),
            'edit' => Pages\EditProjek::route('/{record}/edit'),
        ];
    }
}
