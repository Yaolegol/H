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

# Mysql config

> custom.cnf
> sudo chmod 644 ./custom.cnf

[client]
user=root
password=mysql123456789

[mysqldump]
user=root
password=mysql123456789
add-drop-table
add-locks
create-options
disable-keys
extended-insert
single-transaction
quick
set-charset
events
routines
triggers

# Mysql backup

> sudo mysqldump --defaults-file="/home/oleg/Документы/Clickferma/custom.cnf" --all-databases --result-file="/home/oleg/Документы/Clickferma/h.mysql"
