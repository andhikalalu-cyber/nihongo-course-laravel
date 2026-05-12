FROM php:8.2-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    libzip-dev \
    unzip \
    nodejs \
    npm \
    && docker-php-ext-install pdo pdo_mysql zip

# Copy project files
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --no-dev

# Generate APP_KEY
RUN php artisan key:generate

# Configure Apache
RUN a2enmod rewrite

# Expose port
EXPOSE 8080

# Start server
CMD ["apache2-foreground"]
