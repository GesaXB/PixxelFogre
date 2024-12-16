<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriResource\Pages;
use App\Filament\Resources\KategoriResource\RelationManagers;
use App\Models\Kategori;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KategoriResource extends Resource
{
    protected static ?string $model = Kategori::class;

    protected static ?string $navigationIcon = 'heroicon-o-puzzle-piece';
    protected static ?string $navigationLabel = 'Kategori';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                ->label('Nama Kategori') // Memberikan label yang jelas
                ->placeholder('Masukkan nama kategori') // Placeholder untuk panduan input
                ->required()
                ->maxLength(255)
                ->hint('Masukan Kategori') // Memberikan petunjuk tambahan
                ->prefixIcon('heroicon-o-user') // Menambahkan ikon pada input (menggunakan Heroicons)
                ->extraInputAttributes(['class' => 'rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) // Custom styling
                ->validationAttribute('nama kategori'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                ->label('ID') // Memberikan label
                ->sortable() // Membuat kolom dapat diurutkan
                ->extraAttributes(['class' => 'text-gray-500']), // Styling tambahan agar ID terlihat lebih ringan
                Tables\Columns\TextColumn::make('nama')
                ->label('Nama') // Memberikan label yang deskriptif
                ->sortable() // Menambahkan fitur sorting
                ->searchable() // Menambahkan kemampuan pencarian
                ->limit(30) // Membatasi panjang teks yang ditampilkan
                ->tooltip(fn ($record) => $record->nama) // Menambahkan tooltip untuk teks panjang
                ->extraAttributes(['class' => 'font-semibold text-gray-700']), // Styling tambahan
            ])
            ->filters([
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->label('Edit')
                ->color('#004bbd') // Warna aksi
                ->icon('heroicon-o-pencil') // Ikon aksi edit
                ->tooltip('Edit data ini'), // Menambahkan tooltip,
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Hapus')
                        ->color('danger') // Memberikan warna merah untuk aksi hapus
                        ->icon('heroicon-o-trash') // Ikon untuk aksi hapus
                        ->requiresConfirmation() // Menambahkan konfirmasi sebelum menghapus
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
            'index' => Pages\ListKategoris::route('/'),
            'create' => Pages\CreateKategori::route('/create'),
            'edit' => Pages\EditKategori::route('/{record}/edit'),
        ];
    }
}
