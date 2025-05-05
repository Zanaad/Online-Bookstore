FROM php:8.1-apache

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN a2enmod rewrite
