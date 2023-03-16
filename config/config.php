<?php 
session_start();
//DESENVOLVIMENTO
const DEV = true;

if (DEV) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
} else {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);
    header("Cache-Control: max-age=2592000"); //30days (60sec * 60min * 24hours * 30days)
}

if($_SERVER['SERVER_NAME'] != 'localhost'){
    define('PROTOCOLO', 'https://');
} else {
    define('PROTOCOLO', 'http://');
}

define('URL', PROTOCOLO . $_SERVER['HTTP_HOST']);