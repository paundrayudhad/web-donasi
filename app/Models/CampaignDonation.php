<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignDonation extends Model
{
    //
    protected $fillable = [
        'code',
        'campaign_id',
        'name',
        'phone',
        'amount',
        'status'
    ];

    //menambhakn relasi belongsTo pada model CampaignDonation
    public function campaign()
    {
        //capaign donation memiliki relasi belongsTo/satu dengan campaign
        return $this->belongsTo(Campaign::class);
    }
}
