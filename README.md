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

# Mysql backup S3 credentials

> cd ~

> mkdir .aws

> sudo nano credentials

[default]
aws_access_key_id=
aws_secret_access_key=

# Mysql backup create the backup directory and sh script

> cd /home/oleg/PhpstormProjects/Laravel/H/database

> mkdir mysql

> sudo nano index.sh

# Mysql backup make sh script executable

> sudo chmod +x /home/oleg/PhpstormProjects/Laravel/H/database/backup/index.sh

# Mysql backup cron config

> sudo crontab -e

MAILTO=""
SHELL=/bin/sh
PATH=/bin:/usr/bin:/usr/local/bin
HOME=/home/oleg

* * * * * sh /home/oleg/PhpstormProjects/Laravel/H/database/backup/index.sh
