FROM php:latest

# Install required packages and extensions
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www/html
