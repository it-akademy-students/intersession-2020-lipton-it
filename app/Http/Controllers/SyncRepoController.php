<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class SyncRepoController extends Controller
{
    public function syncRepo(){

//        $doc_path = $_SERVER['DOCUMENT_ROOT'] . '/../tmp/repo';
//        $path = $_SERVER['DOCUMENT_ROOT'] . '/..';
        $path = 'tmp/repo';
        $repo = 'https://github.com/methbkts/cheesy-dex';

//        $process = Process::fromShellCommandline('sh ./clone-repo.sh "$repo" "$path"');
//        ca fonctionne frere

        $process = Process::fromShellCommandline('sh ./script.sh "$repo" "$path"');
//        $process = Process::fromShellCommandline('ls -la');
//        $process = Process::fromShellCommandline('sh ./clone-repo.sh');
//        $tmpPath="testdir\subdir\test";
//        mkdir($tmpPath, 0777, true);
//        $process = Process::fromShellCommandline('git clone  --depth 1 "$repo"', '../tmp/repo');
        $process->run(null, ['repo' => $repo, 'path' => $path]);
//        $process->run();

//        $process = new Process(['which git']);
//        $process = new Process(['git clone --depth 1 ' . $repo]);

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

//        echo $_SERVER['DOCUMENT_ROOT'];
//        echo '/n';
//        echo $doc_path;
//        echo '/n';
        echo $process->getOutput();

//        request()->validate([
//            'repo' => ['required'],
//            'mail' => ['required'],
//        ]);
//
//        $pathRepo = base_path() . "/tmp/repo";
//        $pathLog = base_path() . "/tmp/log";
//        $pathEcs = base_path() . "/tmp/log/ecs_result.md";
//        $pathPhpcs = base_path() ."/tmp/log/phpcs_result.md";
//        $pathProgpilot = base_path() . "/tmp/log/progpilot_result.md";
//        $pathVendor = base_path() . "vendor/bin/";
//        $pathVPhpcs = base_path() . "vendor/squizlabs/php_codesniffer/bin/phpcs";
//        $dirSize = `du -b ` . $pathRepo . ` | awk '{print $1}'`;
//
//        // dd($pathRepo);
//        if(file_exists($pathRepo)) {
//            exec("rm -rf " . $pathRepo);
//            exec("rm -rf .." . $pathRepo);
//            // array_map('unlink', glob($pathRepo . "/*"));
//            // rmdir($pathRepo);
//        }
//
//        exec('git clone --depth 1 ' . request('repo') . " " . $pathRepo);
//        // $process = new Process(["bash " . base_path() . "/clone-repo.sh " . request('repo') . " && " . base_path() . "./analyze-code.sh"]);
//        // exec("bash " . base_path() . "/clone-repo.sh " . request('repo') . " && " . base_path() . "./analyze-code.sh");
//        // exec("node js/capture-website.js {$url} {$id} {$type} 2>&1", $out, $err);/
//        // try{
//        //     $stripeCharge = (new User)->charge(request('amount'), request('paymentMethod'));
//        // } catch (Exception $error){
//        //     print_r('An error occured :'.$error);
//        // }
//        if(file_exists($pathLog)) {
//            exec("rm -rf " . $pathLog);
//            exec("rm -rf .." . $pathLog);
//            exec("mkdir -p " . $pathLog);
//            // array_map('unlink', glob($pathRepo . "/*"));
//            // rmdir($pathRepo);
//        } else {
//            exec("mkdir -p " . $pathLog);
//        }
//
//        if($dirSize >= 100000000 ) {
//            exec("rm -rf " . $pathRepo);
//            exec("rm -rf .." . $pathRepo);
//            return ('Le dossier est trop gros');
//        }
//
//        exec("find . -type f -path '*tmp/repo*' -not -name '*.php' -delete");
//        exec("find -type f -path '*tmp*/repo*' -name 'adminer.php' -delete");
//        exec($pathVendor . "progpilot " . $pathRepo . " &> " .  $pathProgpilot);
//        exec($pathVendor . "ecs check " . $pathRepo . " --set array &>" . $pathEcs);
//        // exec($pathVendor . "ecs check " . $pathRepo . " --set clean-code &>> " .$pathEcs);
//        // exec($pathVendor . "ecs check " . $pathRepo . " --set comments &>> " . $pathEcs);
//        // exec($pathVendor . "ecs check " . $pathRepo . " --set common &>> " . $pathEcs);
//        // exec($pathVendor . "ecs check " . $pathRepo . " --set control-structures &>> " . $pathEcs);
//        // exec($pathVendor . "ecs check " . $pathRepo . " --set dead-code &>> " . $pathEcs);
//        // exec($pathVendor . "ecs check " . $pathRepo . " --set docblock &>> " . $pathEcs);
//        // exec($pathVendor . "ecs check " . $pathRepo . " --set namespaces &>> " . $pathEcs);
//        // exec($pathVendor . "ecs check " . $pathRepo . " --set php70 &>> " . $pathEcs);
//        // exec($pathVendor . "ecs check " . $pathRepo . " --set php71 &>> " . $pathEcs);
//        // exec($pathVendor . "ecs check " . $pathRepo . " --set psr12 &>> " . $pathEcs);
//        // exec($pathVendor . "ecs check " . $pathRepo . " --set spaces &>> " . $pathEcs);
//        $options = ['clean-code', 'comments', 'common', 'control-structures', 'dead-code', 'docblock', 'namespaces', 'php70', 'php71', 'psr12', 'spaces'];
//        foreach($options as $option){
//            exec($pathVendor . "ecs check " . $pathRepo . " --set ". $option . " &>> " . $pathEcs);
//        }
//        exec($pathVPhpcs . "ecs check " . $pathRepo . " --set spaces &>> " . $pathPhpcs);
    }
}
