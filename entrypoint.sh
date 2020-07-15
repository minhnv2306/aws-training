#!/bin/sh -l

echo "Hello $1"

mkdir ~/.ssh
touch ~/.ssh/id_rsa
touch ~/.ssh/known_hosts

echo "$2" > ~/.ssh/id_rsa

echo "Host 52.15.170.75
    HostName 52.15.170.75
    User ubuntu
    IdentityFile ~/.ssh/id_rsa" > ~/.ssh/config
ssh-keyscan 52.15.170.75 > ~/.ssh/known_hosts

cat ~/.ssh/config
cat ~/.ssh/known_hosts

chmod 600 ~/.ssh/id_rsa
chmod 644 ~/.ssh/config
chmod 644 ~/.ssh/known_hosts

ssh -o StrictHostKeyChecking=no -T ubuntu@52.15.170.75

cd ~/.ssh

ls -la
