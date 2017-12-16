#!/bin/bash
if [ "$#" = 0 ]
then
    echo No commit message, no add and no push.
    exit
fi

if [ "$#" = 1 ]
then
    git add .
    git commit -m "$1"
    git push
else
    git add "$2" "$3" "$4" "$5" "$6" "$7" "$8" "$9"
    git commit -m "$1"
    git push
fi
