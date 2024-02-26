# Use the official PHP 7.4 image
FROM php:7.4-cli

# Set the working directory inside the container
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install zip pdo_mysql

# Install phpredis extension
RUN pecl install redis && \
    docker-php-ext-enable redis

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy composer files and install dependencies
COPY composer.json composer.json
COPY composer.lock composer.lock
RUN composer install --no-scripts --no-autoloader

# Copy the rest of the application
COPY . .

# Generate the autoloader
RUN composer dump-autoload --optimize

# Expose port 8000 to the host (adjust as needed)
EXPOSE 8000


# Start the PHP built-in server
# CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
