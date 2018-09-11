<?php
/**
 * Created by PhpStorm.
 * User: mostafa
 * Date: 09/09/2018
 * Time: 03:06 AM
 */

namespace Payment;


use Illuminate\Support\Facades\Facade;

class PaymentFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'payment';
    }


}