FROM php:7.3-fpm

# Instalar extensão PDO MySQL
RUN docker-php-ext-install pdo_mysql