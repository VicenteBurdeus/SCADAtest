FROM php:8.2-apache

# Instalar herramientas necesarias y extensiones requeridas
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    vim \
    libpq-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_pgsql zip

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Establecer directorio de trabajo
WORKDIR /var/www/html

# Copiar el proyecto al contenedor
COPY /src /var/www/html

# Instalar PHPMailer dentro del contenedor
RUN composer require phpmailer/phpmailer

# Exponer el puerto 80 del contenedor
EXPOSE 80
