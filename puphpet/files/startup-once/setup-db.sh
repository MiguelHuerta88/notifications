#!/bin/bash
(cd /var/www/sites && php artisan migrate && php artisan db:seed)