<?php

declare(strict_types=1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

/* YOUR CODE (Instructions in README.md) */


require_once APP_PATH . 'Transaction.php';
require_once APP_PATH . 'FileService.php';

$obj  = new Transaction(FILES_PATH);

$transactions = $obj->getResult();

require_once APP_PATH . 'ViewService.php';
require_once VIEWS_PATH . 'transactions.php';
