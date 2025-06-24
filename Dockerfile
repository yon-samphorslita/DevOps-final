# Use official PHP image with PHP 8.2 FPM
FROM php:8.2-fpm

# Install NGINX, SSH, PHP extensions, Composer, and Node.js
RUN apt-get update && apt-get install -y \
    nginx \
    openssh-server \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    git \
    curl \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql \
    && apt-get clean

# Set up SSH
RUN mkdir /var/run/sshd \
    && echo 'root:Hello@123' | chpasswd

# Set up the working directory
WORKDIR /var/www/html

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

# Install Node.js and npm
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash - \
    && apt-get install -y nodejs

# Expose the necessary ports
EXPOSE 8080 22

# Set the entrypoint to start NGINX and PHP-FPM
CMD service nginx start && php-fpm
