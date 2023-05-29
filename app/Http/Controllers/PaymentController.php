<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Paystack;
use Unicodeveloper\Paystack\Facades\Paystack as FacadesPaystack;

class PaymentController extends Controller
{
    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway(Request $request)
    {
        try {
            $data = $request->validated();
            return Paystack::getAuthorizationUrl($data)->redirectNow();
        } catch (\Exception $e) {
            return Redirect::back()->withMessage(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        // dd(request()->all());

        // $whitelisted_ip = ['52.31.139.75', '52.49.173.169', '52.214.14.220'];

        // if(!in_array(\request()->ip(), $whitelisted_ip))
        //     exit();

        // if ((strtoupper($_SERVER['REQUEST_METHOD']) != 'POST') || !array_key_exists('HTTP_X_PAYSTACK_SIGNATURE', $_SERVER))
        //     exit();

        // $input = @file_get_contents("php://input");
        // define('PAYSTACK_SECRET_KEY', env('PAYSTACK_SECRET_KEY'));

        // // validate event do all at once to avoid timing attack
        // if ($_SERVER['HTTP_X_PAYSTACK_SIGNATURE'] !== hash_hmac('sha512', $input, PAYSTACK_SECRET_KEY))
        //     exit();

        try {
            $paymentDetails = FacadesPaystack::getPaymentData();
            $paymentDetails = (object)$paymentDetails;
            $data = (object)$paymentDetails->data;
            $transaction = Transaction::where('trx_reference', $data->reference)->where('status', 0)->first();

            if (!$transaction){
                toast('Transaction not found', 'error');
                return redirect()->back();
            }

            if ($paymentDetails->status == 'success') {
                if ($data->status == 'success') {
                    $transaction->user->books()->attach($transaction->book_id, ['return_date' => now()->addDays($transaction->book->rentage_period)]);

                    $transaction->book->my_request()->update(['status' => 3]);

                    $transaction->update(['status' => 1]);
                    toast('Payment Successful and book added to your collection', 'success');
                    return redirect()->route('book.collection');
                }

            }

            $transaction->update(['status' => 2]);
            toast('Payment Failed, please try again', 'error');
            return redirect()->back();
        } catch (\Throwable $exception) {
            dd($exception);
            toast('Error occured while processing your payment', 'error');
            return redirect()->back();
        }
    }
}
