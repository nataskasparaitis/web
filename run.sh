#!/bin/bash
set -e  # stop on any error

# Install Docker
sudo apt-get update

if ! command -v docker &> /dev/null; then
    curl -fsSL https://get.docker.com/ -o get-docker.sh
    sudo sh get-docker.sh
    sudo systemctl start docker
    sudo systemctl enable docker
    echo "Docker installed: $(docker --version)"
else
    echo "Docker already installed"
fi

# Add user to docker group
if ! groups $USER | grep -q docker; then
    sudo usermod -aG docker $USER
    newgrp docker
fi

# Install Docker Compose plugin
if ! docker compose version &> /dev/null; then
    sudo apt-get install -y docker-compose-plugin
else
    echo "Docker Compose already installed"
fi

if [ ! -d ~/web ]; then
    git clone https://github.com/MantasVI/web.git
else
    echo "web folder already exists, skipping"
fi

# Then clone docker examples and copy docker/ folder
if [ ! -d ~/laravel-docker-examples ]; then
    git clone https://github.com/dockersamples/laravel-docker-examples.git ~/laravel-docker-examples
fi
cp -r ~/laravel-docker-examples/docker ~/web/

# Set up Laravel .env automatically
cd ~/web

if [ ! -f .env ]; then
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
    echo ".env already exists, skipping"
fi

# Start containers
sudo docker compose -f compose.dev.yaml up -d
sudo docker compose -f compose.dev.yaml ps

# Install composer dependencies
sudo docker compose -f compose.dev.yaml exec workspace composer install


echo "Waiting for MySQL to be ready..."
sleep 15
# Run migrations inside container
sudo docker compose -f compose.dev.yaml exec workspace php artisan migrate
sudo docker compose -f compose.dev.yaml exec workspace php artisan db:seed

echo ""
echo "✓ Done! Your Laravel app should be running."