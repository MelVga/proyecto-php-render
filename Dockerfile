FROM php:8.2-apache
RUN docker-php-ext-install pdo pdo_pgsql
COPY api/ /var/www/html/api/
COPY index.html /var/www/html/
EXPOSE 80
