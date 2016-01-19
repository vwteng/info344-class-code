#!/usr/bin/env bash

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

# install MySQL
sudo DEBIAN_FRONTEND=noninteractive apt-get install -y mysql-server

# run the SQL commands from the mysql_secure_installation script
# except for setting the root password (so that we don't embed)
# the root password in our provisioning script
mysql -u root <<-EOF
DELETE FROM mysql.user WHERE User='root' AND Host NOT IN ('localhost', '127.0.0.1', '::1');
DELETE FROM mysql.user WHERE User='';
DELETE FROM mysql.db WHERE Db='test' OR Db='test\_%';
FLUSH PRIVILEGES;
EOF

# install MongoDB and tools
sudo apt-key adv --keyserver hkp://keyserver.ubuntu.com:80 --recv EA312927
echo "deb http://repo.mongodb.org/apt/ubuntu trusty/mongodb-org/3.2 multiverse" | sudo tee /etc/apt/sources.list.d/mongodb-org-3.2.list
sudo apt-get update
sudo apt-get install -y mongodb-org

# install the kerberos library
# which is needed to build the MongoDB
# Node.js driver during npm install
sudo apt-get install -y libkrb5-dev

# install pm2 utility for managing node servers
sudo npm install -g pm2 --loglevel error
