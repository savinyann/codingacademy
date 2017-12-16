#!/bin/bash
if [ "$#" -lt 3 ]; then
    exit
fi
sed -i -e s/"$2"/"$3"/ "$1"
