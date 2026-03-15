#!/usr/bin/env sh
set -e

: "${PORT:=10000}"

cat >/etc/apache2/ports.conf <<EOF
Listen ${PORT}
EOF

cat >/etc/apache2/sites-available/000-default.conf <<EOF
<VirtualHost *:${PORT}>
    ServerAdmin webmaster@localhost
    DocumentRoot /var/www/html/public

    <Directory /var/www/html/public>
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog \${APACHE_LOG_DIR}/error.log
    CustomLog \${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
EOF

if [ -f /var/www/html/artisan ]; then
    php /var/www/html/artisan config:clear || true
    php /var/www/html/artisan cache:clear || true
    php /var/www/html/artisan route:clear || true
    php /var/www/html/artisan view:clear || true
    php /var/www/html/artisan migrate --force || true
fi

exec apache2-foreground
