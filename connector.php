<?php


class connector
{
    function routes()
    {
        $head = new head;
        $body = new body;
        $nav = new nav;
        $footer = new footer;
        $auth = new auth;

        if ($_SERVER['REQUEST_URI'] == '/')
        {
            $head->output('Главная');
            $body->output();
            $nav->output('index');
            $footer->output();
        }
        if ($_SERVER['REQUEST_URI'] == '/auth')
        {
            $head->output('Авторизация');
            $body->output();
            $nav->output('auth');
            $auth->output();
            $footer->output();
        }
    }
}