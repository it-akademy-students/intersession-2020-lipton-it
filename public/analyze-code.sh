#!/bin/bash
if [ ! -d "./tmp/log" ]
then
    mkdir -p ./tmp/log
else
    rm -rf ./tmp/log
    mkdir -p ./tmp/log
fi

#check size of repo
dirSize=`du -b tmp/repo | awk '{print $1}'`
if [ $dirSize -ge 100000000 ]
then
    rm -rf repo
    echo 'ko, je suis trop gros'
    return 1 2> /dev/null || exit 1
else
    echo 'ok'
fi

#find files doesnt have .php in ext and delete this
find . -type f -path '*tmp/repo*' -not -name "*.php" -delete
#find and delete file adminer.php
find . -type f -path '*tmp*/repo*' -name 'adminer.php' -delete

#Start analyzing with library
echo "Start analyzing :"
echo "[░░░░░░░░░░░░░░░░░░░░░░░░░░░░]   0%"
echo "start progpilot"
vendor/bin/progpilot ./tmp/repo >> ./tmp/log/progpilot_result.md
echo "[▓▓▓▓░░░░░░░░░░░░░░░░░░░░░░░░]   10% progpilot ended successfully"
echo "start ecs"
vendor/bin/ecs check ./tmp/repo --set array > ./tmp/log/ecs_result.md
echo "1/13 ecs"
vendor/bin/ecs check ./tmp/repo --set clean-code >> ./tmp/log/ecs_result.md
echo "[▓▓▓▓▓▓▓░░░░░░░░░░░░░░░░░░░░░]   20%"
echo "2/13 ecs"
vendor/bin/ecs check ./tmp/repo --set comments >> ./tmp/log/ecs_result.md
echo "3/13 ecs"
vendor/bin/ecs check ./tmp/repo --set common >> ./tmp/log/ecs_result.md
echo "4/13 ecs"
echo "[▓▓▓▓▓▓▓▓▓▓▓░░░░░░░░░░░░░░░░░]   30%"
vendor/bin/ecs check ./tmp/repo --set control-structures >> ./tmp/log/ecs_result.md
echo "5/13 ecs"
vendor/bin/ecs check ./tmp/repo --set dead-code >> ./tmp/log/ecs_result.md
echo "6/13 ecs"
echo "[▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░░░░░░░░░░░]   40%"
vendor/bin/ecs check ./tmp/repo --set docblock >> ./tmp/log/ecs_result.md
echo "7/13 ecs"
vendor/bin/ecs check ./tmp/repo --set namespaces >> ./tmp/log/ecs_result.md
echo "[▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░░░░░░░░░]   50%"
echo "8/13 ecs"
vendor/bin/ecs check ./tmp/repo --set php70 >> ./tmp/log/ecs_result.md
echo "[▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░░░░░░]   60%"
echo "9/13 ecs"
vendor/bin/ecs check ./tmp/repo --set php71 >> ./tmp/log/ecs_result.md
echo "10/13 ecs"
vendor/bin/ecs check ./tmp/repo --set phpunit >> ./tmp/log/ecs_result.md
echo "[▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░░░░]   70%"
echo "11/13 ecs"
vendor/bin/ecs check ./tmp/repo --set psr12 >> ./tmp/log/ecs_result.md
echo "12/13 ecs"
vendor/bin/ecs check ./tmp/repo --set spaces >> ./tmp/log/ecs_result.md
echo "[▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░]   80%"
echo "13/13 ecs"
echo "ecs ended successfully"

echo "start php codesniffer"
vendor/squizlabs/php_codesniffer/bin/phpcs --standard=PSR2 ./tmp/repo > ./tmp/log/phpcs_result.md
echo "[▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░]   90% php codesniffer ended successfully"

echo "[▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓]   100%"
echo "analyze ended successfully"
