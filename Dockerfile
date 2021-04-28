FROM composer:latest as build

WORKDIR /app
COPY  . /app



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