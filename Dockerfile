FROM php:7.4-apache
RUN apt-get update && apt-get install -y \
    zip \
    unzip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www
COPY  composer* .
RUN composer install

CMD ["apachectl", "-D", "FOREGROUND"]