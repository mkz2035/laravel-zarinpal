<?php
/**
 * Created by PhpStorm.
 * User: mostafa
 * Date: 09/09/2018
 * Time: 03:06 AM
 */

namespace Payment;


use SoapClient;

class Payment
{
    public function pay($user_MerchantID, $user_price, $user_Description, $user_Email = null, $user_mobile = null, $user_CallbackURL)
    {
//        $MerchantID = $user_MerchantID; //Required
//        $Amount = $user_price; //Amount will be based on Toman - Required
//        $Description = $user_Description; // Required
//        $Email = $user_Email; // Optional
//        $Mobile = $user_mobile; // Optional
//        $CallbackURL = $user_CallbackURL;// Required
        $client = new \SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);
        $result = $client->PaymentRequest(
            [
                'MerchantID' => $user_MerchantID,
                'Amount' => $user_price,
                'Description' => $user_Description,
                'Email' => $user_Email,
                'Mobile' => $user_mobile,
                'CallbackURL' => $user_CallbackURL,
            ]
        );

//Redirect to URL You can do it also by creating a form
        if ($result->Status == 100) {
            \Payment\Models\Payment::create([
                'resnumber' => $result->Authority,
                'fullName' => request('fullname'),
                'email' => request('email'),
                'price' => request('price'),
                'description' => request('description'),
                'transaction_code' => rand(1000, 5000000),
                'status' => true,
            ]);
            return redirect('https://www.zarinpal.com/pg/StartPay/' . $result->Authority);
//            Header('Location: https://www.zarinpal.com/pg/StartPay/' . $result->Authority);
//برای استفاده از زرین گیت باید ادرس به صورت زیر تغییر کند:
//Header('Location: https://www.zarinpal.com/pg/StartPay/'.$result->Authority.'/ZarinGate');
        } else {
            echo 'ERR: ' . $result->Status;
        }

    }

    public function checker($user_MerchantID)
    {
        $Authority = request('Authority');
        $payment = \Payment\Models\Payment::where('resnumber', $Authority)->firstOrFail();

        if (request('Status') == 'OK') {

            $client = new \SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

            $result = $client->PaymentVerification(
                [
                    'MerchantID' => $user_MerchantID,
                    'Authority' => $Authority,
                    'Amount' => $payment->price,
                ]
            );

            if ($result->Status == 100) {

                return view('payment::callback-payment-form', compact('payment'));

            } else {
                echo 'Transaction failed. Status:' . $result->Status;
            }
        } else {
            echo 'Transaction canceled by user';
        }


    }

    public function convertToPersianNumber($number)
    {
        $number = str_replace('0', '۰',$number);
        $number = str_replace('1', '۱',$number);
        $number = str_replace('2', '۲',$number);
        $number = str_replace('3', '۳',$number);
        $number = str_replace('4', '۴',$number);
        $number = str_replace('5', '۵',$number);
        $number = str_replace('6', '۶',$number);
        $number = str_replace('7', '۷',$number);
        $number = str_replace('8', '۸',$number);
        $number = str_replace('9', '۹',$number);
        return $number;


    }
}