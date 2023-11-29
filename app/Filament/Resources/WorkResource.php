<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkResource\Pages;
use App\Filament\Resources\WorkResource\RelationManagers;
use App\Models\GoodPropName;
use App\Models\GoodPropValue;
use App\Models\Stack;
use App\Models\Work;
use Awcodes\FilamentTableRepeater\Components\TableRepeater;
use Filament\Forms;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WorkResource extends Resource
{
    protected static ?string $model = Work::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Grid::make(3)
                        ->schema([
                            Forms\Components\TextInput::make('title')
                                ->required()
                                ->label('Название')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('order')
                                ->required()
                                ->label('Order')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('link')
                                ->required()
                                ->label('Ссылка на сайт')
                                ->maxLength(255),
                        ]),
                    Grid::make()
                        ->schema([
                            SpatieMediaLibraryFileUpload::make('work_cover_card')
                                ->collection('work_cover_card')
                                ->required()
                                ->multiple()
                                ->label('Карточка на главной (png|jpg)')
                                ->image(),
                            SpatieMediaLibraryFileUpload::make('work_cover_full')
                                ->collection('work_cover_full')
                                ->required()
                                ->multiple()
                                ->label('Главное изображение (png|jpg)')
                                ->image()
                        ]),
                    Grid::make()
                        ->schema([
                            RichEditor::make('desc_card')
                                ->required()
                                ->disableToolbarButtons([
                                    'attachFiles',
                                    'codeBlock',
                                ])
                                ->label('Описание в карточке'),
                            RichEditor::make('desc_full')
                                ->required()
                                ->disableToolbarButtons([
                                    'attachFiles',
                                    'codeBlock',
                                ])
                                ->label('Описание полное'),
                        ]),
                    Grid::make()
                        ->schema([
                            RichEditor::make('text_detailed_1')
                                ->required()
                                ->label('Описание детальное 1')
                                ->disableToolbarButtons([
                                    'attachFiles',
                                    'codeBlock',
                                ]),
                            RichEditor::make('text_detailed_2')
                                ->required()
                                ->label('Описание детальное 2')
                                ->disableToolbarButtons([
                                    'attachFiles',
                                    'codeBlock',
                                ]),
                        ]),

                    Grid::make()
                        ->schema([
                            SpatieMediaLibraryFileUpload::make('cover_desc_detailed_1_small')
                                ->collection('cover_desc_detailed_1_small')
                                ->required()
                                ->multiple()
                                ->label('cover_desc_detailed_1_small')
                                ->image(),

                            SpatieMediaLibraryFileUpload::make('cover_desc_detailed_1_full')
                                ->collection('cover_desc_detailed_1_full')
                                ->required()
                                ->multiple()
                                ->label('cover_desc_detailed_1_full')
                                ->image(),

                            SpatieMediaLibraryFileUpload::make('cover_desc_detailed_2_small')
                                ->collection('cover_desc_detailed_2_small')
                                ->required()
                                ->multiple()
                                ->label('cover_desc_detailed_2_small')
                                ->image(),
                            SpatieMediaLibraryFileUpload::make('cover_desc_detailed_2_full')
                                ->collection('cover_desc_detailed_2_full')
                                ->required()
                                ->multiple()
                                ->label('cover_desc_detailed_2_full')
                                ->image(),
                        ]),

                    TagsInput::make('stacks')
                        ->suggestions(Stack::distinct()->pluck('name')->toArray())
                        ->label('Технологии')
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->searchable(),
                Tables\Columns\TextColumn::make('order')
                    ->label('Order')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Название')
                    ->searchable(),
                Tables\Columns\TextColumn::make('link')
                    ->label('Ссылка на сайт'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Создан')
                    ->dateTime('d M Y H:i'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Обновлен')
                    ->dateTime('d M Y H:i'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListWorks::route('/'),
            'create' => Pages\CreateWork::route('/create'),
            'edit' => Pages\EditWork::route('/{record}/edit'),
        ];
    }
}
