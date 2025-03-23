<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CampaignNewsResource\Pages;
use App\Filament\Resources\CampaignNewsResource\RelationManagers;
use App\Models\CampaignNews;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CampaignNewsResource extends Resource
{
    protected static ?string $model = CampaignNews::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Select::make('campaign_id')
                    ->label('Campaign')
                    ->relationship('campaign', 'title')
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->label('Title')
                    ->required(),
                Forms\Components\RichEditor::make('content')
                    ->label('Content')
                    ->required()
                    ->ColumnSpanFull(),
                Forms\Components\Datepicker::make('date')
                    ->label('Date')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('campaign.title'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('date')
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
            'index' => Pages\ListCampaignNews::route('/'),
            'create' => Pages\CreateCampaignNews::route('/create'),
            'edit' => Pages\EditCampaignNews::route('/{record}/edit'),
        ];
    }
}
