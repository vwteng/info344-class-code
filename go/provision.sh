# update the package index
echo "updating the package index..."
apt-get update > /dev/null 2>&1

# install git
echo "installing git..."
apt-get install -y git > /dev/null 2>&1

# install Go v1.6
echo "downloading and installing go v1.6..."
wget https://storage.googleapis.com/golang/go1.6.linux-amd64.tar.gz > /dev/null 2>&1
tar -C /usr/local -xzf go1.6.linux-amd64.tar.gz
echo "export PATH=$PATH:/usr/local/go/bin" >> .bashrc

# set /vagrant to be our GOPATH
echo "setting GOPATH to /vagrant" 
echo "export GOPATH=/vagrant" >> .bashrc

echo "provisioning complete!"
