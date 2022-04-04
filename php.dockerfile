FROM php:7.1-apache
RUN apt-get update -y && apt-get upgrade -y
RUN docker-php-ext-install pdo pdo_mysql
COPY . /var/www/html/