#!/bin/bash
if [ -d "./tmp/repo" ]
then
    rm -rf ./tmp/repo
fi
git clone --depth 1 $1 ./tmp/repo