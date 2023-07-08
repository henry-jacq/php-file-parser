<?php

declare(strict_types=1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' .DIRECTORY_SEPARATOR);
define('FILE_PATH', $root . 'files' .DIRECTORY_SEPARATOR);
define('VIEW_PATH', $root . 'views' . DIRECTORY_SEPARATOR);


require APP_PATH . 'App.php';

$files = getFiles(FILE_PATH);
$transactions = [];

foreach($files as $file) {
    $transactions = array_merge($transactions, getTransactions($file));
}

echo '<pre>';
print_r($transactions);
echo '</pre>';
exit;