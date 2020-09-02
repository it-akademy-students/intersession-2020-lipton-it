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
        $pathEcs = base_path() . "/tmp/log/ecs_result.md";
        // $pathPhpcs = base_path() ."/tmp/log/phpcs_result.md";
        $pathProgpilot = base_path() . "/tmp/log/progpilot_result.md";
        $pathVendor = base_path() . "/vendor/bin/";
        $pathVPhpcs = base_path() . "/vendor/squizlabs/php_codesniffer/bin/phpcs";
        $dirSize = "du -b " . $pathRepo . " | awk '{print $1}'";

        if(file_exists($pathRepo)) {
            exec("rm -rf " . $pathRepo);
            exec("rm -rf .." . $pathRepo);

        }

        exec('git clone --depth 1 ' . request('repo') . " " . $pathRepo);
        exec("rm -rf /var/www/tmp/repo/.git ");
        exec("rm -rf /var/www/tmp/repo/.gitignore");
        exec("rm -rf /var/www/tmp/repo/.htaccess");
        exec("rm -rf /var/www/tmp/repo/adminer.php");

        function getDirContents($dir, &$results = array()) {
            $files = scandir($dir);
        
            foreach ($files as $key => $value) {
                $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
                if (!is_dir($path)) {
                    $results[] = $path;
                } else if ($value != "." && $value != "..") {
                    getDirContents($path, $results);
                    if(is_dir($path)) {
                    }else {
                        $results[] = $path;

                    }
                }
            }
        
            return $results;
        }
        $allPath = getDirContents('/var/www/tmp/repo');
        var_dump( $allPath);

        foreach($allPath as $file){ 
            if(!strstr($file, ".php")) {
                unlink($file);
            }
        }


        if(file_exists($pathLog)) {
            exec("rm -rf " . $pathLog);
            // exec("rm -rf .." . $pathLog);
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
        
        // dd(realpath($pathVendor) . "progpilot " . realpath($pathRepo) . " &> " .  realpath($pathProgpilot));
        // exec(realpath($pathVendor) . "progpilot " . realpath($pathRepo) . " >> " .  realpath($pathProgpilot));
        exec($pathVendor . "progpilot " . $pathRepo . " >> " .  $pathProgpilot);
        exec($pathVendor . "ecs check " . $pathRepo . " --set array >>" . $pathEcs);

        exec($pathVendor . "ecs check " . $pathRepo . " --set clean-code >> " .$pathEcs);
        exec($pathVendor . "ecs check " . $pathRepo . " --set comments >> " . $pathEcs);
        exec($pathVendor . "ecs check " . $pathRepo . " --set common >> " . $pathEcs);
        exec($pathVendor . "ecs check " . $pathRepo . " --set control-structures >> " . $pathEcs);
        exec($pathVendor . "ecs check " . $pathRepo . " --set dead-code >> " . $pathEcs);
        exec($pathVendor . "ecs check " . $pathRepo . " --set docblock >> " . $pathEcs);
        exec($pathVendor . "ecs check " . $pathRepo . " --set namespaces >> " . $pathEcs);
        exec($pathVendor . "ecs check " . $pathRepo . " --set php70 >> " . $pathEcs);
        exec($pathVendor . "ecs check " . $pathRepo . " --set php71 >> " . $pathEcs);
        exec($pathVendor . "ecs check " . $pathRepo . " --set psr12 >> " . $pathEcs);
        exec($pathVendor . "ecs check " . $pathRepo . " --set spaces >> " . $pathEcs);
        /*
        // $options = ['clean-code', 'comments', 'common', 'control-structures', 'dead-code', 'docblock', 'namespaces', 'php70', 'php71', 'psr12', 'spaces'];
        // foreach($options as $option){
        //     exec($pathVendor . "ecs check " . $pathRepo . " --set ". $option . " &>> " . $pathEcs);
        // }
*/
        // exec($pathVPhpcs . "ecs check " . $pathRepo . " --set spaces >> " . $pathPhpcs);
        // exec($pathVPhpcs . " --standard==PSR12 " . $pathRepo . " >> " . $pathPhpcs);
    }
}