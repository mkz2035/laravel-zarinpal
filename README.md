# laravel-zarinpal
## written by mostafa karimzadeh
#### Accountant in khu university
laravel-zarinpal is a package for Laravel 5+ provides helpers for simple payment for iranian usres
### Features
* Friendly Interface
* Ease of use
* Ease of set Merchant_ID and callback function
* Has form for register price and information of user
## Installation
### 1 - Dependency
The first step is using composer to install the package and automatically update your composer.json file, you can do this by running
```
composer require mostafa_kz/zarinpal_payment
```
### 2 - Provider
You need to update your application configuration in order to register the package so it can be loaded by Laravel, just update your **config/app.php** file adding the following code at the end of your '**provide**
```
    'providers' => [
         Payment\PaymentServiceProvider::class,
    ],
```
### 3 - Facade
In order to use the **Payment** facade, you need to register it on the **config/app.php** file, you can do that the following way:
```
   'aliases' => [
    'Payment' => Payment\PaymentFacade::class,
    ],
```
### 4 - Configuration
In your terminal type
```
  php artisan vendor:publish
```
or
```
 php artisan vendor:publish --provider=" Payment\PaymentServiceProvider"

```
## Usage
### 1 - Database(Migration)
run this command for init tables in your project
```
 php artisan migrate

```
### 2 - Init Routes
put this routes in **web.php**
```
Route::get('/','PaymentController@payForm');
Route::post('/installment/payment', 'PaymentController@payInstallment')->name('payment.redirectBank');
//your callback Url
Route::get(config('payment.CallBack_Url'),'PaymentController@checkPayment');
```
### 3 - Init Controllers
run this command for create controller
```
php artisan make:controller PaymentController
```
then put this code on **PaymentController**
```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Payment;

class PaymentController extends Controller
{
    public function payForm()
    {
        return view('bank.payment-form');

    }

    public function payInstallment()
    {
        $price = request('price');
        $desc = request('description');
        $merchant_id=config('payment.Merchant_ID');
        $callback = config('payment.CallBack_Url');
        return Payment::pay($merchant_id, $price, $desc, null, null, $callback);
    }

    public function checkPayment()
    {

        return Payment::checker(config('payment.Merchant_ID'));
    }

}
```
### 4 - Set your config
update your **config/payment.php** for set **Merchant_ID** and **callback Url** 


**good luck :)**
