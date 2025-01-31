<?php
namespace App\Filament\Resources;

use App\Models\HealthRecord;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\EditRecord;

class HealthRecordResource extends Resource
{
    protected static ?string $model = \App\Models\HealthRecord::class;

    public static function shouldRegisterNavigation(): bool
    {
        return true;
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('child_id')->required(),
                Forms\Components\TextInput::make('height')->required(),
                Forms\Components\TextInput::make('weight')->required(),
                Forms\Components\TextInput::make('vaccination_status')->required(),
                Forms\Components\Textarea::make('notes'),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('child.name')->label('Child Name'),
                Tables\Columns\TextColumn::make('height')->sortable(),
                Tables\Columns\TextColumn::make('weight')->sortable(),
                Tables\Columns\TextColumn::make('vaccination_status'),
                Tables\Columns\TextColumn::make('created_at')->label('Recorded At'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRecords::route('/'),
            'create' => CreateRecord::route('/create'),
            'edit' => EditRecord::route('/{record}/edit'),
        ];
    }
}
