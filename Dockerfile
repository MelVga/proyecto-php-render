FROM php:8.2-apache

# Instala extensiones de PostgreSQL
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql

# Copia el proyecto a la imagen
COPY . /var/www/html/

# Mueve tu API a una subruta
RUN mkdir /var/www/html/api && mv /var/www/html/api/* /var/www/html/api/

# Habilita mod_rewrite (por si lo necesitas)
RUN a2enmod rewrite

# Permisos y limpieza
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html
