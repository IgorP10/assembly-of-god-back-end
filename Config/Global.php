<?php

declare(strict_types=1);

defined('PATH_ROOT') || define('PATH_ROOT', str_replace(['/Public', '\Public'], ['', ''], getcwd()));
defined('HOST') || define('HOST', $_SERVER['HTTP_HOST'] ?? 'localhost');

function ddd(... $expressions)
{
    $backtrace = debug_backtrace();
    $line      = $backtrace[0]['line'];
    $file      = $backtrace[0]['file'];
    echo "\nExport called at: $file ($line) \n";
    $count   = func_num_args();
    $argList = func_get_args();
    for ($i = 0; $i < $count; $i++) {
        echo "[$i]\n";
        var_export($argList[$i]);
        echo "\n";
    }
    die;
}
