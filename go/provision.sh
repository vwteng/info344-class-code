# update the package index
echo "updating the package index..."
apt-get update > /dev/null 2>&1

# install git
echo "installing git..."
apt-get install -y git > /dev/null 2>&1

# install Go v1.6
echo "downloading and installing go v1.6..."
export DOWNLOAD=/home/vagrant/downloads
mkdir -p $DOWNLOAD
wget -O $DOWNLOAD/go1.6.linux-amd64.tar.gz https://storage.googleapis.com/golang/go1.6.linux-amd64.tar.gz > /dev/null 2>&1
tar -C /usr/local -xzf $DOWNLOAD/go1.6.linux-amd64.tar.gz
echo "export PATH=$PATH:/usr/local/go/bin" >> .bashrc

# setup the GOPATH
export GOPATH=/home/vagrant/go
echo "creating the GOPATH..."
mkdir -p $GOPATH
chown vagrant:vagrant $GOPATH
echo "export GOPATH=$GOPATH" >> /home/vagrant/.bashrc

echo "provisioning complete!"
