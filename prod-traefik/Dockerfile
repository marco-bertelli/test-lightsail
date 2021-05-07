from php:5-fpm

RUN docker-php-ext-install mysql

RUN printf '[PHP]\ndate.timezone = "Europe/Rome"\n' > /usr/local/etc/php/conf.d/tzone.ini