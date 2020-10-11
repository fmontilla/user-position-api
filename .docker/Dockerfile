FROM php:7.3.23-apache

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
COPY . /var/www/html
COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf
# EXPOSE 80
# EXPOSE 81
# EXPOSE 82

WORKDIR /var/www/html

RUN apt-get update; \
    apt-get -y install apt-utils git libxml2 libxml2-dev zip curl; \
    docker-php-ext-install mbstring pdo pdo_mysql soap bcmath \
    && pecl install xdebug-beta \
    && docker-php-ext-enable xdebug \
    && echo "xdebug.idekey=docker" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && docker-php-ext-enable soap \
    && curl -sL https://deb.nodesource.com/setup_9.x | bash - \
    && apt-get install -y nodejs \
    && curl -L https://www.npmjs.com/install.sh | sh \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer \
    && chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite && service apache2 restart
