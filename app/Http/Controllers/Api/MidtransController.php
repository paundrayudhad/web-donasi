<?php
 
namespace App\Http\Controllers\Api;
 
use App\Http\Controllers\Controller;
use App\Models\CampaignDonation;
use Illuminate\Http\Request;
 
class MidtransController extends Controller
{
    public function callback(Request $request)
    {
        $serverKey = config('midtrans.serverKey');
        $hashedKey = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
 
        if ($hashedKey !== $request->signature_key) {
            return response()->json(['message' => 'Invalid signature key'], 403);
        }
 
        $campaignStatus = $request->transaction_status;
        $orderId = $request->order_id;
        $donation = CampaignDonation::where('code', $orderId)->first();
 
        if (!$donation) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }
 
 
        switch ($campaignStatus) {
            case 'capture':
                if ($request->payment_type == 'credit_card') {
                    if ($request->fraud_status == 'challenge') {
                        $donation->update(['status' => 'pending']);
                    } else {
                        $donation->update(['status' => 'success']);

                        // Send message
                        $this->sendMessage($donation);
                    }
                }
                break;
            case 'settlement':
                $donation->update(['status' => 'success']);

                // Send message
                $this->sendMessage($donation);
                break;
            case 'pending':
                $donation->update(['status' => 'pending']);
                break;
            case 'deny':
                $donation->update(['status' => 'failed']);
                break;
            case 'expire':
                $donation->update(['status' => 'failed']);
                break;
            case 'cancel':
                $donation->update(['status' => 'failed']);
                break;
            default:
                $donation->update(['status' => 'failed']);
                break;
        }
 
        return response()->json(['message' => 'Callback received successfully'], 200);
    }
    private function sendMessage($donation)
    {
        $curl = curl_init();
 
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $donation->phone,
                'message' => 'Terimakasih telah melakukan donasi kepada kami, semoga bermanfaat untuk semua. Terimakasih',
                'countryCode' => '62', //optional
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: nnrzjeiVgJ8QuvEsLWGz' //change TOKEN to your actual token
            ),
        ));
 
        curl_exec($curl);
 
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
        }
        curl_close($curl);
 
        if (isset($error_msg)) {
            echo $error_msg;
        }
 
        return true;
    }
}