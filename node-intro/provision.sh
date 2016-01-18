#!/usr/bin/env bash

# use noninteractive mode
export DEBIAN_FRONTEND=noninteractive

# suppress erroneous error messages from dpkg-preconfigure
sudo rm -v /etc/apt/apt.conf.d/70debconf

# update the package database 
sudo apt-get update

# install git
sudo apt-get install -y git

# install Node.js v5.x
curl -sL https://deb.nodesource.com/setup_4.x | sudo -E bash -
sudo apt-get install -y nodejs

# install build-essential for Node modules w/native code
sudo apt-get install -y build-essential

# allow Node.js servers to bind to low ports
sudo apt-get install -y chase
sudo apt-get install -y libcap2-bin
sudo setcap cap_net_bind_service=+ep $(chase $(which node))

# install MongoDB and tools
sudo apt-key adv --keyserver hkp://keyserver.ubuntu.com:80 --recv EA312927
echo "deb http://repo.mongodb.org/apt/ubuntu trusty/mongodb-org/3.2 multiverse" | sudo tee /etc/apt/sources.list.d/mongodb-org-3.2.list
sudo apt-get update
sudo apt-get install -y mongodb-org

# install pm2 utility for managing node servers
sudo npm install -g pm2 --loglevel error
