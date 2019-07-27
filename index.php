<?php
include($_SERVER['DOCUMENT_ROOT'] . '/global_vars.php');
include($_SERVER['DOCUMENT_ROOT'] . '/functions.php');
include($_SERVER['DOCUMENT_ROOT'] . '/en.php');
include($_SERVER['DOCUMENT_ROOT'] . '/ru.php');
include($_SERVER['DOCUMENT_ROOT'] . '/views/connect.php');
include($_SERVER['DOCUMENT_ROOT'] . '/connector.php');
include($_SERVER['DOCUMENT_ROOT'] . '/db.php');

class index
{
    function init()
    {
        global $language;
        unset($user);
        $functions = new functions;
        $functions->sessionHandler();
        $functions->__auth();
        global $user;
        if ($user and !$_SESSION['selected']){$_SESSION['selected'] = $user['prefered_language'];}
        elseif (!$user and !$_SESSION['selected']) {
            $_SESSION['selected'] = 'ru';
        }
        $connector = new connector;
        $connector->routes();
    }
}

$index = new index;
$index->init();
