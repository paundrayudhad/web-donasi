<?php

namespace App\Filament\Resources\CampaignDonationResource\Pages;

use App\Filament\Resources\CampaignDonationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCampaignDonation extends EditRecord
{
    protected static string $resource = CampaignDonationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
