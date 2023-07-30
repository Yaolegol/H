<?php

require_once('/home/oleg/PhpstormProjects/Laravel/H/vendor/autoload.php');
require_once('/home/oleg/PhpstormProjects/Laravel/H/app/Http/Controllers/helpers/common/assets/index.php');

$s3 = S3_STORAGE_getS3Client();
$s3->upload('clickferma-buckets-mysql', 'backup/common/backup.mysql', file_get_contents(__DIR__ . '/../mysql/backup.mysql'));
