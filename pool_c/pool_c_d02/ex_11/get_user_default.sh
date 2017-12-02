#!/bin/bash
if [ $# != 1 ]
then
    echo Error.
    exit
fi
test=`grep -c $1 /etc/passwd`
if [ $test -ne 1 ]
then
    echo Error.
else
home=`sed -n /"$1"/p /etc/passwd | cut -d: -f 6`
shell=`sed -n /"$1"/p /etc/passwd | cut -d: -f 7`
echo Home Directory: "$home"
echo Default Shell: "$shell"
fi
