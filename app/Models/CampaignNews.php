<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignNews extends Model
{
    //
    protected $fillable = [
        'campaign_id', 
        'title', 
        'content', 
        'date'
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
