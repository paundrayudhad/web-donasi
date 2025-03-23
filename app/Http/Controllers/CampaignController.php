<?php

namespace App\Http\Controllers;

use App\Http\Requests\CampaignDonationStoreRequest;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CampaignController extends Controller
{
    //
    public function index()
    {
        $campaigns = Campaign::paginate(5);

        return view('pages.campaign.index', compact('campaigns'));
        
    }
    public function show($slug)
    {
        $campaign = Campaign::where('slug', $slug)->first();

        return view('pages.campaign.show', compact('campaign'));
    }
    public function donation($slug)
    {
        $campaign = Campaign::where('slug', $slug)->first();

        return view('pages.campaign.donation', compact('campaign'));
    }

    public function storeDonation(CampaignDonationStoreRequest $request, $slug)
    {
        $request = $request->validated();

        $campaign = Campaign::where('slug', $slug)->first();

        $donation = $campaign->campaignDonations()->create([
            'code' => 'DONATION-' . Str::random(5),   
            'amount' => $request['amount'],
            'name' => $request['name'],
            'phone' => $request['phone'],
            'status' => 'pending',
        ]);

        //set Your merchant Server key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        //set to Development/Sandbox configironment (default). Set to true for Production configironment (accept real transaction).
        \Midtrans\Config::$isProduction = config('midtrans.isProduction');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = config('midtrans.isSanitized');
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = config('midtrans.is3ds');

        //Buat Array ke midrans
        $params = [
            'transaction_details' => [
                'order_id' => $donation->code,
                'gross_amount' => $donation->amount,
            ],
            'customer_details' => [ 
                'first_name' => $donation->name,
            ],
        ];

        $paymentUrl = \Midtrans\Snap::createTransaction($params)->redirect_url;

        return redirect($paymentUrl);
    }
    public function success()
    {
        return view('pages.campaign.donation-success');
    }
}
