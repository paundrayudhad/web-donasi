<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    //mene
    protected $fillable = [
        'title', 
        'slug', 
        'thumbnail', 
        'description', 
        'target', 
        'end_date'
    ];
    //menambahkan relasi hasMany pada model Campaign
    public function campaignDonations()
    {
        //campaign memiliki relasi hasMany/banyak dengan campaign donation
        return $this->hasMany(CampaignDonation::class);
    }

    public function campaignNews()
    {
        //campaign memiliki relasi hasMany/banyak dengan campaign news
        return $this->hasMany(CampaignNews::class);
    }
}
