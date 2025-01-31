<?php

namespace App\Filament\Admin\Resources\ChildResource\Pages;

use App\Filament\Admin\Resources\ChildResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateChild extends CreateRecord
{
    protected static string $resource = ChildResource::class;
}
