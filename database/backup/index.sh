sudo mysqldump \
    --defaults-file="/home/oleg/Документы/Clickferma/custom.cnf" \
    --all-databases \
    --result-file="/home/oleg/PhpstormProjects/Laravel/H/database/backup/mysql/backup.mysql" \
    && \
    php /home/oleg/PhpstormProjects/Laravel/H/database/backup/S3/index.php
