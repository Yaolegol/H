<?php

require_once(app_path() . '/Http/Controllers/helpers/common/assets/index.php');

$s3 = S3_STORAGE_getS3Client();
$data = $s3->upload('clickferma-buckets-mysql', 'common',  file_get_contents(__DIR__ . '/../mysql/backup.mysql'));

