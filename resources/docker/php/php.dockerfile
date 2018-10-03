FROM php:7-fpm

RUN apt-get update
RUN apt-get install -y unzip libicu-dev libxml2-dev zlib1g-dev

RUN pecl install -o -f xdebug-2.6.0
RUN echo "zend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-20170718/xdebug.so" > /usr/local/etc/php/conf.d/xdebug.ini;
#RUN docker-php-ext-configure calendar && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
#RUN docker-php-ext-install calendar gd pdo pdo_mysql mysqli mcrypt intl soap
RUN docker-php-ext-install pdo pdo_mysql mysqli mbstring intl soap zip
