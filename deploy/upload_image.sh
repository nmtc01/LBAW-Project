#!/bin/bash

# Stop execution if a step fails
set -e

DOCKER_USERNAME=lbaw2064 # Replace by your docker hub username
IMAGE_NAME=lbaw2064-piu

docker build -t $DOCKER_USERNAME/$IMAGE_NAME .
docker push $DOCKER_USERNAME/$IMAGE_NAME
