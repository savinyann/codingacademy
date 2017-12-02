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
    finger "$1" | grep Directory | sed -e 's/Directory/Home Directory/' | sed -e 's/Shell/Default Shell/'
fi
