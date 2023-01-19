<?php

namespace App\Filament\Resources\OrganizationResource\Pages;

use App\Filament\Resources\OrganizationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListOrganizations extends ListRecords
{
    protected static string $resource = OrganizationResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()->visible(Auth::user()->email=='taptomi@gmail.com'),
        ];
    }
}
