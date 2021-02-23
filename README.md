# magistratus.backend

Back end application for a police force tracking system

# Installing
apt install composer
apt install php-xml
apt install php-pgsql

git clone git@github.com:unum15/magistratus.backend.git
cd magistratus.backend
composer install
cp .env.example .env
./artisan migrate (you'll need to manually create a database first)




