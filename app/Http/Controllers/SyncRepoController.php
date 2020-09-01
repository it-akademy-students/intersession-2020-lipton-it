<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SyncRepoController extends Controller
{
    public function syncRepo(){
        request()->validate([
            'repo' => ['required'],
            'mail' => ['required'],
        ]);

        // dd(base_path());

        exec("bash " . base_path() . "/clone-repo.sh " . request('repo') . " && " . base_path() . "./analyze-code.sh");
        // exec("node js/capture-website.js {$url} {$id} {$type} 2>&1", $out, $err);/
        // try{
        //     $stripeCharge = (new User)->charge(request('amount'), request('paymentMethod'));
        // } catch (Exception $error){
        //     print_r('An error occured :'.$error);
        // }
    }
}
