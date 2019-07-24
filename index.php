<?php
include($_SERVER['DOCUMENT_ROOT'] . '/global_vars.php');
include($_SERVER['DOCUMENT_ROOT'] . '/functions.php');
include($_SERVER['DOCUMENT_ROOT'] . '/en.php');
include($_SERVER['DOCUMENT_ROOT'] . '/ru.php');
include($_SERVER['DOCUMENT_ROOT'] . '/views/connect.php');
include($_SERVER['DOCUMENT_ROOT'] . '/connector.php');

class index
{
    function init()
    {
        global $language;
        session_start();
        $_SESSION['selected'] = 'ru';
        $connector = new connector;
        $connector->routes();
    }
}

$index = new index;
$index->init();
