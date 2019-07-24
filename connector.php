<?php


class connector
{
    function routes()
    {
        $pattern = '/^\/anime\/genres\/([a-zA-Z-|]+)$/';
        $head = new head;
        $body = new body;
        $nav = new nav;
        $footer = new footer;
        $auth = new auth;
        $profile = new profile;
        $anime = new anime;
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
        if ($_SERVER['REQUEST_URI'] == '/profile')
        {
            $head->output('Ваш профиль');
            $body->output();
            $nav->output('profile');
            $profile->output();
            $footer->output();
        }
        if ($_SERVER['REQUEST_URI'] == '/anime')
        {
            $head->output('Аниме');
            $body->output();
            $nav->output('anime');
            $anime->output();
            $footer->output();
        }
        if ($_SERVER['REQUEST_URI'] == '/manga')
        {
            $head->output('Манга');
            $body->output();
            $nav->output('manga');
            $footer->output();
        }
        if (preg_match($pattern, $_SERVER['REQUEST_URI']) == 1){
            echo 'работает';
        }
    }
}