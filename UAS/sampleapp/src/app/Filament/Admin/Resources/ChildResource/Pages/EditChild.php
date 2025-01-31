<?php

namespace App\Filament\Admin\Resources\ChildResource\Pages;

use App\Filament\Admin\Resources\ChildResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditChild extends EditRecord
{
    protected static string $resource = ChildResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
