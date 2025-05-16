FROM php:8.1-apache

# Instalar las herramientas necesarias para compilar y la librería de PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Copiar archivos del proyecto al contenedor
COPY . /var/www/html/

# Opcional: Exponer puerto 80
EXPOSE 80