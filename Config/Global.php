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

function getHost() : string
{
    if (!empty($_SERVER['HTTP_X_FORWARDED_HOST'])) {
        $elements = explode(',', $_SERVER['HTTP_X_FORWARDED_HOST']);
        return trim(end($elements));
    }
    foreach (['HTTP_HOST', 'SERVER_NAME', 'SERVER_ADDR'] as $key) {
        if (!empty($_SERVER[$key])) {
            return trim($_SERVER[$key]);
        }
    }
    return '';
}

function getHostComplete() : string
{
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ) {
        return 'https://'. getHost();
    }

    $configuration = new Kernel\Configuration\Configuration();
    if ($configuration->get('APP_MODE') === 'production') {
        return 'https://'. getHost();
    }

    return 'http://'. getHost();
}

function getHostURI() : string
{
    return $_SERVER['REQUEST_URI'];
}

//function translate(string $key, array $params = []) : ?string
//{
//    $language = new \Config\LanguageTranslation\Language\BrazilianPortuguese();
//
//    $translate = $language->getTranslations();
//
//    if (!isset($translate[$key])) {
//        return null;
//    }
//
//    if (count($params) > 0) {
//        return str_replace(array_keys($params), $params, $translate[$key]);
//    }
//
//    return $translate[$key];
//}

function getIp() : string
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'] ?? '';
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? '';
    } else {
        $ip = $_SERVER['REMOTE_ADDR'] ?? '';
    }

    return (string)$ip;
}

function getUserAgent() : string
{
    return $_SERVER["HTTP_USER_AGENT"] ?? '';
}
