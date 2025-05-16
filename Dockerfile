FROM php:8.2-apache

# Instala extensiones necesarias para PostgreSQL
RUN docker-php-ext-install pdo pdo_pgsql

# Copia el contenido del proyecto al servidor
COPY . /var/www/html/

# Establece permisos
RUN chown -R www-data:www-data /var/www/html/

# Expone el puerto
EXPOSE 80
