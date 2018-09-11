<?php
/**
 * Created by PhpStorm.
 * User: mostafa
 * Date: 09/10/2018
 * Time: 07:05 AM
 */

namespace Payment\Models;


use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    protected $fillable=['resnumber','fullName','email','price','status','description','transaction_code'];

}