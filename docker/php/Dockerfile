FROM php:8.3.12-fpm

RUN echo 'alias ls="ls -lh --color"' >> ~/.bashrc
RUN echo 'alias ll="ls -lah --color"' >> ~/.bashrc

RUN apt-get update -y && apt-get install -y \
        libssh2-1-dev libssh2-1 \
        nano \
        iputils-ping \
    && pecl install ssh2 \
	&& docker-php-ext-install -j$(nproc) mysqli sockets pdo pdo_mysql \
    && docker-php-ext-enable ssh2

RUN apt-get update && apt-get install -y libqrencode4 default-mysql-client \
    less vim procps

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

VOLUME /code

WORKDIR /code

COPY . /code

RUN cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini
COPY docker/php/php-overrides.ini /usr/local/etc/php/conf.d/php-overrides.ini
COPY docker/php/php-fpm-overrides.conf /usr/local/etc/php-fpm.d/php-fpm-overrides.conf

CMD ["php-fpm"]