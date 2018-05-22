#!/bin/bash
#copy local-dotenv to laravel
cp /var/www/sites/local/local-dotenv /var/www/sites/.env
# add entry for notification api
echo "192.168.56.109" >> /etc/hosts