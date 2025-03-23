<?php

namespace App\Filament\Resources\CampaignNewsResource\Pages;

use App\Filament\Resources\CampaignNewsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCampaignNews extends EditRecord
{
    protected static string $resource = CampaignNewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
