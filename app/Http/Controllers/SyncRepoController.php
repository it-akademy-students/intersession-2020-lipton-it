<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class SyncRepoController extends Controller
{
    public function syncRepo(){

        request()->validate([
            'repo' => ['required'],
            'mail' => ['required'],
        ]);
            
        $pathRepo = base_path() . "/tmp/repo";
        $pathLog = base_path() . "/tmp/log";
        $dirSize = `du -b ` . $pathRepo . ` | awk '{print $1}'`;

        // dd($pathRepo);
        if(file_exists($pathRepo)) {
            exec("rm -rf " . $pathRepo);
            exec("rm -rf .." . $pathRepo);
            // array_map('unlink', glob($pathRepo . "/*"));
            // rmdir($pathRepo);
        }

        exec('git clone --depth 1 ' . request('repo') . " " . $pathRepo);
        // $process = new Process(["bash " . base_path() . "/clone-repo.sh " . request('repo') . " && " . base_path() . "./analyze-code.sh"]);
        // exec("bash " . base_path() . "/clone-repo.sh " . request('repo') . " && " . base_path() . "./analyze-code.sh");
        // exec("node js/capture-website.js {$url} {$id} {$type} 2>&1", $out, $err);/
        // try{
        //     $stripeCharge = (new User)->charge(request('amount'), request('paymentMethod'));
        // } catch (Exception $error){
        //     print_r('An error occured :'.$error);
        // }
        if(file_exists($pathLog)) {
            exec("rm -rf " . $pathLog);
            exec("rm -rf .." . $pathLog);
            exec("mkdir -p " . $pathLog);
            // array_map('unlink', glob($pathRepo . "/*"));
            // rmdir($pathRepo);
        } else {
            exec("mkdir -p " . $pathLog);
        }

        if($dirSize >= 100000000 ) {
            exec("rm -rf " . $pathRepo);
            exec("rm -rf .." . $pathRepo);
            return ('Le dossier est trop gros');
        }

        exec("find . -type f -path '*tmp/repo*' -not -name '*.php' -delete");
        exec("find -type f -path '*tmp*/repo*' -name 'adminer.php' -delete");

        
    }
}
