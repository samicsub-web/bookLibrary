<?php

namespace App\Traits;

trait Paystack {

    
    private $curl_url   =   "https://api.paystack.co/transaction/initialize";
    private $verify_url =   "https://api.paystack.co/transaction/verify/";

    //private $redirect_link = 'http://localhost:3000/redirect?status=';
    private $redirect_link = 'http://payonline.tfolc.org/redirect?status=';  
    

     public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    




    public function sendToGateway($amount,$email,$currency){
    
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->curl_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
              'amount'=>$amount * 100,
              'email'=>$email,
              'currency'=>$currency,
            ]),
            CURLOPT_HTTPHEADER => [
              "authorization: Bearer ". config('book.PAYSTACK_SECRET_KEY', 'Laravel') , //replace this with your own test key
              "content-type: application/json",
              "cache-control: no-cache"
            ],
          ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        if($err){ return response()->json(['error'=>$err],400);}  // there was an error contacting the Paystack API // die('Curl returned error: ' . $err);
        return   $tranx = json_decode($response, true);
        }
    
    
    
    
    public function doCallback($ref){
    
        $curl = curl_init();
        $reference = isset($ref) ? $ref : '';
        if(!$reference){
          die('No reference supplied');
        }
    
        curl_setopt_array($curl, array(
          CURLOPT_URL => $this->verify_url . rawurlencode($reference),
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_HTTPHEADER => [
            "accept: application/json",
            "authorization: Bearer ". config('book.PAYSTACK_SECRET_KEY', 'Laravel'),
            "cache-control: no-cache"
          ],
        ));
    
        $response = curl_exec($curl);
        $err = curl_error($curl);
    
        if($err){die('Curl returned error: ' . $err);}// there was an error contacting the Paystack API
        return $response;
    
    }





    







}