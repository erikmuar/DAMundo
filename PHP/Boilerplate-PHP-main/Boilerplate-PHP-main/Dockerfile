FROM php:apache

# DocumentRoot = /var/www/html/src
ENV APACHE_DOCUMENT_ROOT=/var/www/html/src

# Cambia el vhost y apache2.conf para usar ese docroot
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/000-default.conf /etc/apache2/apache2.conf \
 && a2enmod rewrite

# Instalar la extensión mysqli
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
# Instalar la extensión pdo
RUN docker-php-ext-install pdo pdo_mysql && docker-php-ext-enable pdo pdo_mysql
