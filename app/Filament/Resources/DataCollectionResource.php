<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\DataCollection;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Fieldset;
use Filament\Infolists\Components\Fieldset as InfolistFieldset;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Forms\Components\Grid;
use Filament\Infolists\Components\Grid as InfolistGrid;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DataCollectionResource\Pages;
use App\Filament\Resources\DataCollectionResource\RelationManagers;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;

class DataCollectionResource extends Resource
{
    protected static ?string $model = DataCollection::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Resident Information')
                ->description('This is the resident information section.')
                ->schema([
                    Fieldset::make('Full Name')
                    ->schema([
                        Forms\Components\TextInput::make('first_name')
                        ->maxLength(191),
                        Forms\Components\TextInput::make('middle_name')
                        ->maxLength(191),
                        Forms\Components\TextInput::make('last_name')
                        ->maxLength(191),
                    ])->columns(3),
                    Fieldset::make('Father\'s Full Name')
                    ->schema([
                        Forms\Components\TextInput::make('father_first_name')
                        ->label('First Name')
                    ->maxLength(191),
                    Forms\Components\TextInput::make('father_middle_name')
                    ->label('Middle Name')
                    ->maxLength(191),
                    Forms\Components\TextInput::make('father_last_name')
                    ->label('Last Name')
                    ->maxLength(191),
                    ])->columns(3),
                    Fieldset::make('Mother\'s Full Name')
                    ->schema([
                        Forms\Components\TextInput::make('mother_first_name')
                        ->label('First Name')
                        ->maxLength(191),
                        Forms\Components\TextInput::make('mother_middle_name')
                        ->label('Middle Name')
                        ->maxLength(191),
                        Forms\Components\TextInput::make('mother_last_name')
                        ->label('Last Name')
                        ->maxLength(191),
                    ])->columns(3),
                ]),
                Grid::make()
                ->schema([
                    Forms\Components\DatePicker::make('date_of_birth')
                    ->label('Date of Birth'),
                    Forms\Components\TextInput::make('place_of_birth_city')
                    ->label('Place of Birth (City)')
                        ->maxLength(191),
                ])
                ->columns(2),
                Grid::make()
                ->schema([
                    Forms\Components\Textarea::make('address'),
                ])
                ->columns(1),
                Grid::make()
                ->schema([
                    Forms\Components\TextInput::make('latitude')
                        ->numeric(),
                    Forms\Components\TextInput::make('longitude')
                        ->numeric(),
                ])
                ->columns(2)
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
                    ->label('Place of Birth (City)')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->button(),
                Tables\Actions\ViewAction::make()->button()->color('warning'),
            ]
            // , position: ActionsPosition::BeforeColumns
             )
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                   Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                InfolistFieldset::make('Full Name')
                ->schema([
                    TextEntry::make('first_name'),
                    TextEntry::make('middle_name'),
                    TextEntry::make('last_name'),
                ])->columns(3),
                InfolistFieldset::make('Father\'s Full Name')
                ->schema([
                    TextEntry::make('father_first_name'),
                    TextEntry::make('father_middle_name'),
                    TextEntry::make('father_last_name'),
                ])->columns(3),
                InfolistFieldset::make('Mother\'s Full Name')
                ->schema([
                    TextEntry::make('mother_first_name'),
                    TextEntry::make('mother_middle_name'),
                    TextEntry::make('mother_last_name'),
                ])->columns(3),
                InfolistGrid::make()
                ->schema([
                    TextEntry::make('date_of_birth')->date(),
                    // ->since(),
                    TextEntry::make('place_of_birth_city')
                    ->label('Place of Birth (City)'),
                ])->columns(2),
                InfolistGrid::make()
                ->schema([
                    TextEntry::make('address')
                ])
                ->columns(1),
                InfolistGrid::make()
                ->schema([
                    TextEntry::make('latitude'),
                    TextEntry::make('longitude'),
                ])->columns(2),

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
            'view' => Pages\ViewDataCollection::route('/{record}'),
            'edit' => Pages\EditDataCollection::route('/{record}/edit'),
        ];
    }
}
