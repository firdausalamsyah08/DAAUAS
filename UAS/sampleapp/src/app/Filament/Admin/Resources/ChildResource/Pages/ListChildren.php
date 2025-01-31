<?php

namespace App\Filament\Admin\Resources\ChildResource\Pages;

use App\Filament\Admin\Resources\ChildResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListChildren extends ListRecords
{
    protected static string $resource = ChildResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
