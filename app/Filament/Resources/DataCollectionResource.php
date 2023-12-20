<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\DataCollection;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Enums\ActionsPosition;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DataCollectionResource\Pages;
use App\Filament\Resources\DataCollectionResource\RelationManagers;

class DataCollectionResource extends Resource
{
    protected static ?string $model = DataCollection::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('first_name')
                    ->maxLength(191),
                Forms\Components\TextInput::make('last_name')
                    ->maxLength(191),
                Forms\Components\TextInput::make('middle_name')
                    ->maxLength(191),
                Forms\Components\DatePicker::make('date_of_birth'),
                Forms\Components\TextInput::make('place_of_birth_city')
                    ->maxLength(191),
                Forms\Components\TextInput::make('place_of_birth_province')
                    ->maxLength(191),
                Forms\Components\TextInput::make('place_of_birth_country')
                    ->maxLength(191),
                Forms\Components\TextInput::make('father_first_name')
                    ->maxLength(191),
                Forms\Components\TextInput::make('father_last_name')
                    ->maxLength(191),
                Forms\Components\TextInput::make('father_middle_name')
                    ->maxLength(191),
                Forms\Components\TextInput::make('mother_first_name')
                    ->maxLength(191),
                Forms\Components\TextInput::make('mother_last_name')
                    ->maxLength(191),
                Forms\Components\TextInput::make('mother_middle_name')
                    ->maxLength(191),
                Forms\Components\TextInput::make('latitude')
                    ->numeric(),
                Forms\Components\TextInput::make('longitude')
                    ->numeric(),
                Forms\Components\TextInput::make('place_id')
                    ->maxLength(191),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('middle_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_of_birth')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('place_of_birth_city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('place_of_birth_province')
                    ->searchable(),
                Tables\Columns\TextColumn::make('place_of_birth_country')
                    ->searchable(),
                Tables\Columns\TextColumn::make('father_first_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('father_last_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('father_middle_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mother_first_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mother_last_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mother_middle_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('latitude')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('longitude')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('place_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->button(),
                Tables\Actions\DeleteAction::make()->button()->outlined(),
            ], position: ActionsPosition::BeforeColumns )
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
            'index' => Pages\ListDataCollections::route('/'),
            'create' => Pages\CreateDataCollection::route('/create'),
            'edit' => Pages\EditDataCollection::route('/{record}/edit'),
        ];
    }
}
