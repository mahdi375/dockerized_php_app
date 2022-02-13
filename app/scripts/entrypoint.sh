#!/bin/sh

./scripts/wait-for-it.sh  db:3037
# sleep 10                                 # can be used instead of wait-for-it...

echo "running migrations ..."

php migrate

echo "db successfully migrated :)"

php-fpm                                  # SOOOOOO IMP READ OFFICIAL Hub.docker 