#!/bin/bash
# Run any migrations we might have
(cd /var/www/sites && php artisan migrate)