FROM php:8.2-apache
# Instala y habilita la extension mysqli
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
COPY . /var/www/html/mi_app_cine
