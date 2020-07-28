FROM php:7.2-fpm

# Change Nginx config here...
RUN apt-get update

RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer

EXPOSE 9000
