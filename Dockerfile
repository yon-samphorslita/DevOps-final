# Use official PHP image with Apache and PHP 8.2
FROM php:8.2-fpm

# Install NGINX, SSH, and required PHP extensions
RUN apt-get update && apt-get install -y \
    nginx \
    openssh-server \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql \
    && apt-get clean

# Set up SSH
RUN mkdir /var/run/sshd
RUN echo 'root:Hello@123' | chpasswd

# Set up the working directory
WORKDIR /var/www/html

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

# Expose the necessary ports
EXPOSE 8080 22

# Set the entrypoint to NGINX
CMD service nginx start && php-fpm
