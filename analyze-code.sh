#!/bin/bash

if [ ! -d "./tmp/log" ]
then
    mkdir -p ./tmp/log
else
    rm -rf ./tmp/log
    mkdir -p ./tmp/log
fi

findAdminer=($(find -type f -path '*tmp*/repo*' -name 'adminer.php')) 
rm $findAdminer

echo "Start analyzing :"
echo "[░░░░░░░░░░░░░░░░░░░░░░░░░░░░]   0%"
echo "start progpilot"
vendor/bin/progpilot ./tmp/repo &> ./tmp/log/progpilot_result.md
echo "[▓▓▓▓░░░░░░░░░░░░░░░░░░░░░░░░]   10% progpilot ended successfully"
echo "start ecs"
vendor/bin/ecs check ./tmp/repo --set array &> ./tmp/log/ecs_result.md
echo "1/13 ecs"
vendor/bin/ecs check ./tmp/repo --set clean-code &>> ./tmp/log/ecs_result.md
echo "[▓▓▓▓▓▓▓░░░░░░░░░░░░░░░░░░░░░]   20%"
echo "2/13 ecs"
vendor/bin/ecs check ./tmp/repo --set comments &>> ./tmp/log/ecs_result.md
echo "3/13 ecs"
vendor/bin/ecs check ./tmp/repo --set common &>> ./tmp/log/ecs_result.md
echo "4/13 ecs"
echo "[▓▓▓▓▓▓▓▓▓▓▓░░░░░░░░░░░░░░░░░]   30%"
vendor/bin/ecs check ./tmp/repo --set control-structures &>> ./tmp/log/ecs_result.md
echo "5/13 ecs"
vendor/bin/ecs check ./tmp/repo --set dead-code &>> ./tmp/log/ecs_result.md 
echo "6/13 ecs"
echo "[▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░░░░░░░░░░░]   40%"
vendor/bin/ecs check ./tmp/repo --set docblock &>> ./tmp/log/ecs_result.md
echo "7/13 ecs"
vendor/bin/ecs check ./tmp/repo --set namespaces &>> ./tmp/log/ecs_result.md
echo "[▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░░░░░░░░░]   50%"
echo "8/13 ecs"
vendor/bin/ecs check ./tmp/repo --set php70 &>> ./tmp/log/ecs_result.md
echo "[▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░░░░░░]   60%"
echo "9/13 ecs"
vendor/bin/ecs check ./tmp/repo --set php71 &>> ./tmp/log/ecs_result.md
echo "10/13 ecs"
vendor/bin/ecs check ./tmp/repo --set phpunit &>> ./tmp/log/ecs_result.md
echo "[▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░░░░]   70%"
echo "11/13 ecs"
vendor/bin/ecs check ./tmp/repo --set psr12 &>> ./tmp/log/ecs_result.md
echo "12/13 ecs"
vendor/bin/ecs check ./tmp/repo --set spaces &>> ./tmp/log/ecs_result.md
echo "[▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░]   80%"
echo "13/13 ecs"
echo "ecs ended successfully"

echo "start php codesniffer"
vendor/squizlabs/php_codesniffer/bin/phpcs --standard=PSR2 ./tmp/repo &> ./tmp/log/phpcs_result.md 
echo "[▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░]   90% php codesniffer ended successfully"

echo "[▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓]   100%"
echo "analyze ended successfully"

if [[ -f "./tmp/log/progpilot_err" ]]
then
    echo "Progpilot returned errors"
    echo ""
    cat ./tmp/log/progpilot_err
    echo ""
fi

if [[ -f "./tmp/log/ecs_err" ]]
then
    echo "Ecs returned errors"
    echo ""
    cat ./tmp/log/ecs_err
    echo ""
fi

if [[ -f "./tmp/log/phpcs_err" ]]
then
    echo "PHPCS returned errors"
    echo ""
    cat ./tmp/log/phpcs_err
    echo ""
fi
