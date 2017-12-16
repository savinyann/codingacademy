<<<<<<< HEAD
#!/bin/sh
=======
if [ "$#" != 1 ]
then
    exit
fi
>>>>>>> 953cf317434e8863a3d86bf15f77fda1a3bab40e
blih -u yann.savin@coding-academy.fr repository create $1
if [ "$?" != "0" ]
then
    exit
fi
blih -u yann.savin@coding-academy.fr repository setacl $1 gecko r
if [ "$?" != "0" ]
then
    exit
fi
blih -u yann.savin@coding-academy.fr repository setacl $1 ramassage-tek r
if [ "$?" != "0" ]
then
    exit
fi
git clone git@git.epitech.eu:/yann.savin@coding-academy.fr/$1
if [ "$?" != "0" ]
then
    exit
fi
