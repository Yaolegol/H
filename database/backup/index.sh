mysqldump \
    --defaults-file="/home/oleg/Документы/Clickferma/custom.cnf" \
    --all-databases \
    --result-file="/home/oleg/PhpstormProjects/Laravel/H/database/backup/mysql/backup.mysql" \
    && \
aws \
    --endpoint-url=https://storage.yandexcloud.net \
    s3 \
    cp \
    /home/oleg/PhpstormProjects/Laravel/H/database/backup/mysql/backup.mysql \
    s3://clickferma-buckets-mysql/backup/common/backup.mysql
