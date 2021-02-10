FROM ubuntu:16.04

ENV LANG=C.UTF-8 \
    DEBIAN_FRONTEND=noninteractive

RUN apt-get update && \
    apt-get install -y software-properties-common && \
    add-apt-repository ppa:ondrej/php

RUN apt-get update && \
    apt-get -y upgrade && \
    apt-get -y install --fix-missing \
        supervisor \
        nginx \
        curl \
        git \
        php7.3-fpm \
        php7.3-mysql \
        php7.3-mbstring \
        php7.3-xml \
        php7.3-zip \
        php7.3-pgsql && \
        rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/local/bin --filename=composer && \
    chmod +x /usr/local/bin/composer && \
    composer self-update --1

WORKDIR /var/www

RUN mkdir /var/run/php/

ADD configs/php.ini /etc/php/7.3/fpm/conf.d/99-custom.ini
ADD configs/www.conf /etc/php/7.3/fpm/pool.d/www.conf
ADD configs/supervisord.conf /etc/supervisord.conf
ADD configs/nginx.conf /etc/nginx/nginx.conf

RUN useradd -u 1000 1000

ENTRYPOINT ["/usr/bin/supervisord", "-n", "-c", "/etc/supervisord.conf"]
