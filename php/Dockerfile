# Use an official PHP Apache image
FROM php:8.1-apache

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Install required PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache mod_rewrite (if needed for .htaccess)
RUN a2enmod rewrite
