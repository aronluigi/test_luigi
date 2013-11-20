Ho to install
========================

1) In your hosts file add a domain:
    127.0.0.1 www.test.loc

2) Setup Apache or Nginx:
- Nginx:
    server {
        listen 80;
        server_name www.test.loc;
        root /www/test_luigi/web;

        location / {
            # try to serve file directly, fallback to rewrite
            try_files $uri @rewriteapp;
        }

        location @rewriteapp {
            # rewrite all to app.php - for production
            #rewrite ^(.*)$ /app.php/$1 last;

            # rewrite all to app_dev.php - for development
            rewrite ^(.*)$ /app_dev.php/$1 last;
        }

        location ~ ^/(app|app_dev|config)\.php(/|$) {
            fastcgi_pass 127.0.0.1:9000;
            fastcgi_split_path_info ^(.+\.php)(/.*)$;
            include fastcgi_params;
            fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
            fastcgi_param HTTPS off;
        }
    }

- Apache:
    <VirtualHost *:80>
        ServerName domain.tld
        ServerAlias www.domain.tld

        DocumentRoot /var/www/project/web
        <Directory /var/www/project/web>
            # enable the .htaccess rewrites
            AllowOverride All
            Order allow,deny
            Allow from All
        </Directory>
    </VirtualHost>

3) Setup MySQL connection:
Just edit the test_luigi/app/config/parameters.yml

4) Startup the project
Run the following commands in terminal:
    app/console doctrine:database:create
    app/console doctrine:schema:update --force
    app/console assets:install --symlink
    app/console cache:clear
    app/console assetic:dump
