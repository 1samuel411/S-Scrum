--Procfile--
web: vendor/bin/heroku-php-nginx public/

location / {
    # try to serve file directly, fallback to rewrite
    try_files $uri @rewriteapp;
}

location @rewriteapp {
    # rewrite all to app.php
    rewrite ^(.*)$ /index.php/$1 last;
}

location ~ ^/index\.php(/|$) {
    try_files @heroku-fcgi @heroku-fcgi;
    internal;
}