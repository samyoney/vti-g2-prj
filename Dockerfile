FROM ubuntu:latest
LABEL authors="NGUYEN HONG SON"

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host = host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

ENTRYPOINT ["top", "-b"]
