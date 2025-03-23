<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CampaignDonationResource\Pages;
use App\Filament\Resources\CampaignDonationResource\RelationManagers;
use App\Models\CampaignDonation;
use Filament\Forms;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CampaignDonationResource extends Resource
{
    protected static ?string $model = CampaignDonation::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Select::make('campaign_id')
                ->relationship('campaign', 'title')
                ->required(),
                Forms\Components\TextInput::make('name')
                ->required(),
                Forms\Components\TextInput::make('amount')
                ->numeric()
                ->required(),
                Forms\Components\Select::make('status')
                ->options([
                    'pending' => 'Pending',
                    'success' => 'Success',
                    'failed' => 'Failed',
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('campaign.title'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('amount'),
                Tables\Columns\TextColumn::make('status'),
            ])
            ->filters([
                //
                Tables\Filters\SelectFilter::make('campaign_id')
                ->relationship('campaign', 'title')
                ->label('Select Campaign'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListCampaignDonations::route('/'),
            'create' => Pages\CreateCampaignDonation::route('/create'),
            'edit' => Pages\EditCampaignDonation::route('/{record}/edit'),
        ];
    }
}
