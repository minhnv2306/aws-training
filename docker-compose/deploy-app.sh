#!/bin/bash
########################################
# Put this on a Server
# run chmod +x deploy_app.sh to make the script executable
# 
# Execute this script:  ./deploy_app.sh ariv3ra/python-circleci-docker:$TAG
# Replace the $TAG with the actual Build Tag you want to deploy
#
########################################

set -e

TAG=$1

echo "NGINX_TAG=${TAG}" > ./docker-compose/.env
echo "PHP_FPM_TAG=${TAG}" >> ./docker-compose/.env

cd /var/www/html/docker-deploy/docker-compose

echo "Deploying Docker Container"

docker-compose down

docker-compose build

echo "Starting Docker Composer"

docker-compose up -d

docker-compose ps
