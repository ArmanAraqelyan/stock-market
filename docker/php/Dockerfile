FROM php:8.2-fpm-alpine

WORKDIR /var/www/html

RUN apk --update add wget \
    curl \
    build-base \
    libmemcached-dev \
    libmcrypt-dev \
    libxml2-dev \
    pcre-dev \
    zlib-dev \
    autoconf \
    cyrus-sasl-dev \
    libgsasl-dev \
    oniguruma-dev \
    openssl \
    openssl-dev \
    nodejs \
    npm

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN mkdir /.npm && chown -R 1000:1000 /.npm

COPY src/package.json .
COPY src/package-lock.json .

RUN npm install
RUN mkdir -p src/node_modules/.cache && chmod -R 777 src/node_modules/.cache

RUN rm /var/cache/apk/*