#!/bin/sh
if [ $1 = "development" ] || [ $1 = "testing" ] || [ $1 = "dev" ]; then
  echo "Development mode. Vendor files will be synced";
  rsync -a --stats /var/www/build-cache/vendor/* /var/www/vendor/;
  rsync --inplace --stats /var/www/build-cache/composer.json /var/www/;
  rsync --inplace --stats /var/www/build-cache/composer.lock /var/www/;

  echo "Vendor files were synced";
else
  echo "Non-development mode. Vendor files will be copied";
  copy /var/www/build-cache/vendor/* /var/www/vendor/;
  copy /var/www/build-cache/composer.json /var/www/;
  copy /var/www/build-cache/composer.lock /var/www/;

  echo "Vendor files were copied";
  echo "** Important ** ";
  echo "If ran under `docker-compose` it wont work";
fi

/usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf;
