# Demo Fornt 
![fontend](https://user-images.githubusercontent.com/20787213/121292811-c1082f00-c914-11eb-93c3-a0fab9390a57.gif)


# Demo Backend 
![backend](https://user-images.githubusercontent.com/20787213/121292710-9ae28f00-c914-11eb-9688-bbd9f83f7efd.gif)

# Laravel Quickstart - Basic

## Quick Installation

## Step 1 Install Laravel version 7.x
    ### ลง composer 
    
    composer global require laravel/installer
    
    ### สร้าง โปรเจ็ก laravel foder '/laravel-google-cloud-run'
    
    composer create-project --prefer-dist laravel/laravel:^7.0 laravel-google-cloud-run
    
    ### ทดสอบ รัน laravel
    
    php artisan serve
    
## Step 2 Install Laravel Authentication Quickstart

    composer require laravel/ui:^2.4

    php artisan ui vue --auth
 
## Step 3 Laravel Clear Cache

    ### Clear Cache facade value:

    php artisan cache:clear

    ### Clear Route cache:

    php artisan route:cache
    
    ### Clear View cache:

    php artisan view:clear
    
    ### Clear Config cache:

    php artisan config:cache

 
## Step 4 Create & Config file 'Dockerfile'
    
    ## เปลี่ยน .env ในโปรเจ็ค เป็น .env.prod เพราะ Dockerfile จะมองไม่เห็น 
    ## เช็ค composer version command -> 'composer -V' 
    
    FROM composer:2.0.8 as build
    //FROM composer:1.10.6 as build
    WORKDIR /app
    COPY  . /app
    //RUN composer install

    //FROM php:7.3-apache
    //RUN docker-php-ext-install pdo pdo_mysql

    RUN  composer install --ignore-platform-reqs

    FROM php:7.4-apache

    RUN docker-php-ext-install pdo pdo_mysql
    RUN apt-get update
    RUN apt-get install -y \
        libzip-dev \
        zip \
    && docker-php-ext-install zip


    EXPOSE 8080
    COPY --from=build /app /var/www/
    COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
    COPY .env.prod /var/www/.env 
    RUN chmod 777 -R /var/www/storage/
    RUN echo "Listen 8080" >> /etc/apache2/ports.conf
    RUN chown -R www-data:www-data /var/www/ \
    && a2enmod rewrite

## Step 5 Create & Config file '000-default.conf'
    <VirtualHost *:8080>

        ServerAdmin webmaster@localhost
        DocumentRoot /var/www/public/

        <Directory /var/www/>
          AllowOverride All
          Require all granted
        </Directory>

        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined

    </VirtualHost>

    # vim: syntax=apache ts=4 sw=4 sts=4 sr noet

## Step 6  Create Docker Image

    gcloud builds submit --tag gcr.io/enduro-race-project/enduro-race

    ##PROJECT-ID =>  enduro-race-project
    
## Step 7 Deploying to Cloud Run
    
    gcloud run deploy --image gcr.io/enduro-race-project/enduro-race --platform managed

 ##PROJECT-ID =>  enduro-race-project
    
## Step 8 Add Admin LTE
    update 16/12/2020  Admin LTE
    https://adminlte.io/docs/3.0/
    yarn add admin-lte@^3.0
    https://fontawesome.com/how-to-use/on-the-web/setup/using-package-managers   
    yarn add @fortawesome/fontawesome-free