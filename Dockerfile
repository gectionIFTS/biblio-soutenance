# Utiliser une image PHP 8.2 avec Apache
FROM php:8.2-apache

# Installer les dépendances nécessaires pour Laravel et extensions PHP
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libzip-dev \
    zip \
    unzip \
    libfreetype6-dev \
    libjpeg-dev \
    libwebp-dev \
    libxpm-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp --with-xpm \
    && docker-php-ext-install gd pdo pdo_mysql mbstring zip exif pcntl

# Activer le module Apache rewrite
RUN a2enmod rewrite

# Copier les fichiers du projet dans le dossier web root d’Apache
COPY . /var/www/html

# Donner les droits nécessaires au dossier storage et bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Installer Composer (dernière version officielle)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Installer les dépendances PHP avec Composer
RUN composer install --no-dev --optimize-autoloader

# Exposer le port 80
EXPOSE 80

# Lancer Apache en mode foreground
CMD ["apache2-foreground"]
