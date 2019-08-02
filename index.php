<?php
$time = microtime();
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
        unset($user);
        $oop = [
            'head' => new head,
            'body' => new body,
            'nav' => new nav,
            'footer' => new footer,
            'auth' => new auth,
            'profile' => new profile,
            'animeIndex' => new animeIndex,
            'animePage' => new animePage,
            'db' => new db,
            'functions' => new functions,
            'connector' => new connector,
        ];
        $oop['functions']->sessionHandler();
        $oop['functions']->__auth();
        global $user;
        if ($user and !$_SESSION['selected']){$_SESSION['selected'] = $user['prefered_language'];}
        elseif (!$user and !$_SESSION['selected']) {
            $_SESSION['selected'] = 'ru';
        }

        $oop['connector']->routes($oop);
    }
}

$index = new index;
$index->init();

$timeleft = microtime()-$time;
if ($timeleft > 0) {
    $db = new db;
    $db->insertTechIntoTech($_SERVER['REQUEST_URI'], $timeleft, time());
    $functions = new functions;
    $row = $db->getPageTechs($_SERVER['REQUEST_URI']);
    $average = $functions->averageTimeLeft($row);
}