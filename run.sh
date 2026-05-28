#!/bin/bash
set -e  # stop on any error

# ----------------------------------------------------------------------
# 1. Install Docker Engine (official convenience script)
# ----------------------------------------------------------------------
sudo apt-get update

if ! command -v docker &> /dev/null; then
    echo "Docker not found. Installing Docker Engine..."
    curl -fsSL https://get.docker.com/ -o get-docker.sh
    sudo sh get-docker.sh
    sudo systemctl start docker
    sudo systemctl enable docker
    echo "Docker installed: $(docker --version)"
else
    echo "Docker already installed"
fi

# ----------------------------------------------------------------------
# 2. Add user to docker group (no need for newgrp in a script)
# ----------------------------------------------------------------------
if ! groups $USER | grep -q docker; then
    sudo usermod -aG docker $USER
    echo "User added to docker group. Please log out and back in for changes to take effect."
    # We continue anyway; the next docker commands will use sudo if needed.
fi

# ----------------------------------------------------------------------
# 3. Add official Docker repository (required for docker-compose-plugin)
# ----------------------------------------------------------------------
echo "Adding official Docker repository..."
sudo apt-get install -y ca-certificates curl
sudo install -m 0755 -d /etc/apt/keyrings
sudo curl -fsSL https://download.docker.com/linux/ubuntu/gpg -o /etc/apt/keyrings/docker.asc
sudo chmod a+r /etc/apt/keyrings/docker.asc

# Detect Ubuntu codename
UBUNTU_CODENAME=$(lsb_release -cs)
echo "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.asc] https://download.docker.com/linux/ubuntu $UBUNTU_CODENAME stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
sudo apt-get update

# ----------------------------------------------------------------------
# 4. Install Docker Compose plugin (V2)
# ----------------------------------------------------------------------
if ! docker compose version &> /dev/null; then
    echo "Installing Docker Compose plugin..."
    sudo apt-get install -y docker-compose-plugin
    echo "Docker Compose plugin installed: $(docker compose version)"
else
    echo "Docker Compose plugin already installed"
fi

# ----------------------------------------------------------------------
# 5. Clone or update the project repository
# ----------------------------------------------------------------------
if [ ! -d ~/web ]; then
    echo "Cloning repository..."
    git clone https://github.com/MantasVI/web.git ~/web
else
    echo "Repository already exists, pulling latest changes..."
    cd ~/web && git pull
fi

# ----------------------------------------------------------------------
# 6. Copy docker configuration from examples (if not already present)
# ----------------------------------------------------------------------
if [ ! -d ~/laravel-docker-examples ]; then
    echo "Cloning docker examples..."
    git clone https://github.com/dockersamples/laravel-docker-examples.git ~/laravel-docker-examples
fi
cp -r ~/laravel-docker-examples/docker ~/web/

# ----------------------------------------------------------------------
# 7. Create .env file if it doesn't exist
# ----------------------------------------------------------------------
cd ~/web
if [ ! -f .env ]; then
    echo "Creating .env file..."
    cat > .env << 'EOF'
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:TFoawWg9jGdGiFyPYQgvLhs8BEe9aKBSIcoW1r4BBDc=
APP_DEBUG=true
APP_URL=http://localhost
APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US
APP_MAINTENANCE_DRIVER=file
BCRYPT_ROUNDS=12
LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=bbnfilmai
DB_USERNAME=laravel
DB_PASSWORD=secret
SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null
BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database
CACHE_STORE=database
MEMCACHED_HOST=127.0.0.1
REDIS_CLIENT=phpredis
REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
MAIL_MAILER=log
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
VITE_APP_NAME="${APP_NAME}"
EOF
    echo ".env created"
else
    echo ".env already exists"
fi

# ----------------------------------------------------------------------
# 8. Start Docker containers
# ----------------------------------------------------------------------
echo "Starting Docker containers..."
sudo docker compose -f compose.dev.yaml up -d
sudo docker compose -f compose.dev.yaml ps

# ----------------------------------------------------------------------
# 9. Install Composer dependencies
# ----------------------------------------------------------------------
echo "Installing Composer dependencies..."
sudo docker compose -f compose.dev.yaml exec workspace composer install

# ----------------------------------------------------------------------
# 10. Wait for MySQL and run migrations & seeders
# ----------------------------------------------------------------------
echo "Waiting for MySQL to be ready (15 seconds)..."
sleep 15

echo "Running migrations..."
sudo docker compose -f compose.dev.yaml exec workspace php artisan migrate --force

echo "Running seeders..."
sudo docker compose -f compose.dev.yaml exec workspace php artisan db:seed --force

# ----------------------------------------------------------------------
# 11. Final message
# ----------------------------------------------------------------------
echo ""
echo "✓ Setup complete!"
echo "Your application should be accessible at: http://localhost"
echo "phpMyAdmin: http://localhost:8080 (user: laravel, password: secret)"
echo ""
echo "If you added yourself to the docker group, please log out and back in,"
echo "or run 'newgrp docker' to avoid using sudo for future docker commands."