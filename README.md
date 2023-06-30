# ssl

nginx config

```
location ^~ /.well-known/acme-challenge/ {
    auth_basic off;
    try_files $uri =404;
}
``` 

fetch certificates

> sudo certbot certonly --preferred-challenges http -d clickferma-test.ru --webroot --webroot-path /home/oleg/clickferma/H/public

restart nginx

> sudo service nginx restart
