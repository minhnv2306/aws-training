#!/bin/sh -l

echo "Hello $1"
service ssh start

mkdir ~/.ssh
touch ~/.ssh/id_rsa
touch ~/.ssh/known_hosts

echo "$2" > ~/.ssh/id_rsa

echo "$3" > ~/.ssh/known_hosts

chmod 600 ~/.ssh/id_rsa
chmod 644 ~/.ssh/known_hosts

ssh -o StrictHostKeyChecking=no ubuntu@52.15.170.75
