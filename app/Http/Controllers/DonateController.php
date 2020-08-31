<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DonateController extends Controller
{
    public function donate(){
        request()->validate([
            'paymentMethod' => ['required'],
            'amount' => ['required'],
        ]);

        try{
            $stripeCharge = (new User)->charge(request('amount'), request('paymentMethod'));
        } catch (Exception $error){
            print_r('An error occured :'.$error);
        }
    }
}
