from php:5-fpm

RUN docker-php-ext-install mysql

RUN printf '[PHP]\ndate.timezone = "Europe/Rome"\n' > /usr/local/etc/php/conf.d/tzone.ini

RUN apt-get update && \
    apt-get install -y \



RUN docker-php-ext-install pdo_mysql

RUN docker-php-ext-install zip



# And clean up the image

RUN rm -rf /var/lib/apt/lists/*

 

