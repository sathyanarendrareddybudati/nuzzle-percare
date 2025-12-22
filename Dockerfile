FROM php:8.2-cli

# Install required extensions
RUN docker-php-ext-install pdo pdo_mysql

# Enable rewrite
RUN apt-get update && apt-get install -y \
    libzip-dev unzip \
    && docker-php-ext-install zip

# Set working directory
WORKDIR /app

# Copy project
COPY . /app

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Expose port
EXPOSE 8000

# Start PHP server
CMD php -S 0.0.0.0:8000
