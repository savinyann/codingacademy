#!/bin/bash
if [ -z $1 ]
then
    exit
fi
for i in `seq -w 01 "$1"`
do
	mkdir -p ex_"$i"
done
