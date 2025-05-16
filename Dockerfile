FROM php:8.1-apache

# Actualiza repositorios e instala libpq-dev y otros necesarios
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Copia el código a la carpeta de Apache
COPY . /var/www/html/

# Da permisos
RUN chown -R www-data:www-data /var/www/html

# Expone puerto 80
EXPOSE 80
