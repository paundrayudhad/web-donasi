<?php

namespace App\Filament\Resources\CampaignDonationResource\Pages;

use App\Filament\Resources\CampaignDonationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCampaignDonations extends ListRecords
{
    protected static string $resource = CampaignDonationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
