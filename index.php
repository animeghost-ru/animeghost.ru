<?php
include('global_vars.php');
include('functions.php');
include('views/head.php');
include('views/body.php');
include('views/nav.php');
include('views/footer.php');
include('views/auth.php');
class index
{
    function init()
    {
        if ($_SERVER['REQUEST_URI'] == '/')
        {
            $head = new head;
            $head->output('Главная');
            $body = new body;
            $body->output();
            $nav = new nav;
            $nav->output('index');
            $footer = new footer;
            $footer->output();
        }
        if ($_SERVER['REQUEST_URI'] == '/auth')
        {
            $head = new head;
            $head->output('Авторизация');
            $body = new body;
            $body->output();
            $nav = new nav;
            $nav->output('auth');

            $auth = new auth;
            $auth->output();

            $footer = new footer;
            $footer->output();
        }
    }
}



$index = new index;
$index->init();
