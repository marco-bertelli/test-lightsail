from php:5-fpm

RUN docker-php-ext-install mysql

RUN printf '[PHP]\ndate.timezone = "Europe/Rome"\n' > /usr/local/etc/php/conf.d/tzone.ini

RUN apt-get update && \
    apt-get install -y \
        zlib1g-dev libzip-dev sendmail

RUN echo "sendmail_path=/usr/sbin/sendmail -t -i" >> /usr/local/etc/php/conf.d/sendmail.ini

RUN docker-php-ext-install pdo_mysql

RUN docker-php-ext-install zip

# sendmail config
############################################

RUN apt-get install -q -y ssmtp mailutils

# root is the person who gets all mail for userids < 1000
RUN echo "marcobert37@gmail.com" >> /etc/ssmtp/ssmtp.conf

# Here is the gmail configuration (or change it to your private smtp server)
RUN echo "mailhub=smtp.gmail.com:465" >> /etc/ssmtp/ssmtp.conf
RUN echo "AuthUser=pwebanalysis@gmail.com" >> /etc/ssmtp/ssmtp.conf
RUN echo "AuthPass=sbadabam43" >> /etc/ssmtp/ssmtp.conf
RUN echo "FromLineOverride=YES" >> /etc/ssmtp/ssmtp.conf

RUN echo "UseTLS=YES" >> /etc/ssmtp/ssmtp.conf
RUN echo "UseSTARTTLS=YES" >> /etc/ssmtp/ssmtp.conf


# Set up php sendmail config
RUN echo "sendmail_path=sendmail -i -t" >> /usr/local/etc/php/conf.d/php-sendmail.ini



# And clean up the image

RUN rm -rf /var/lib/apt/lists/*

 

