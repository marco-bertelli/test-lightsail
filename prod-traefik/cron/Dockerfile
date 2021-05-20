from php:5-fpm

RUN docker-php-ext-install mysql

RUN printf '[PHP]\ndate.timezone = "Europe/Rome"\n' > /usr/local/etc/php/conf.d/tzone.ini

RUN apt-get update && \
  apt-get install -y ssmtp && \
  apt-get clean && \
  #da settare a mano con nano !!!!
  echo "root=marcobert37@gmail.com mailhub=smtp.gmail.com:465 UseTLS=Yes AuthUser=pwebanalysis@gmail.com AuthPass=sbadabam43 FromLineOverride=YES" && \
  echo 'sendmail_path = "/usr/sbin/ssmtp -t"' > /usr/local/etc/php/conf.d/mail.ini

RUN chmod 640 /etc/ssmtp/ssmtp.conf
RUN chown root:mail /etc/ssmtp/ssmtp.conf

WORKDIR /var/www

RUN apt-get update
RUN apt-get install -y \
        cron

# Create the log file
RUN touch /var/log/schedule.log
RUN chmod 0777 /var/log/schedule.log

# Add crontab file in the cron directory
ADD scheduler /etc/cron.d/scheduler

# Run the cron
RUN crontab /etc/cron.d/scheduler
CMD ["cron", "-f"]