<?php


class connector
{
    function routes()
    {
        global $user;
        $functions = new functions;
        $patternanimepage = '/^\/anime\/([0-9]+)$/';
        $patternanimegenres = '/^\/anime\/genres\/([a-zA-Z-|]+)$/';
        $patternuserprofile = '/^(\/profile|\/profile\/)$/';
        $patternprofilecustom = '/^\/profile\/([0-9]+)([\/]?)$/';
        $head = new head;
        $body = new body;
        $nav = new nav;
        $footer = new footer;
        $auth = new auth;
        $profile = new profile;
        $animeIndex = new animeIndex;
        $animePage = new animePage;
        $db = new db;
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
        if ((preg_match($patternprofilecustom, $_SERVER['REQUEST_URI']) == 1) and $user)
        {
            $uid = $functions->getUserIdFromURI($_SERVER['REQUEST_URI']);
            $customuser = $db->getUser($uid);
            $mode = 2;
            if ($customuser->rowCount() == 0){$mode = 3; $title = 'Такого пользователя несуществует!';}
            $customuser = $customuser->fetch();
            if ($mode == 2){$title = 'Профиль пользователя - '.$customuser['name'];}
            $head->output('Профиль пользователя - '.$customuser['name']);
            $body->output();
            $nav->output('profile');
            $profile->output($mode, $customuser);
            $footer->output();
        }
        if ((preg_match($patternprofilecustom, $_SERVER['REQUEST_URI']) == 1) and !$user)
        {
            $uid = $functions->getUserIdFromURI($_SERVER['REQUEST_URI']);
            $customuser = $db->getUser($uid);
            $mode = 2;
            if ($customuser->rowCount() == 0){$mode = 3; $title = 'Такого пользователя несуществует!';}
            $customuser = $customuser->fetch();
            if ($mode == 2){$title = 'Профиль пользователя - '.$customuser['name'];}
            $head->output($title);
            $body->output();
            $nav->output('profile');
            $profile->output($mode, $customuser);
            $footer->output();
        }
        if ((preg_match($patternuserprofile, $_SERVER['REQUEST_URI']) == 1) and $user)
        {
            $head->output('Ваш профиль');
            $body->output();
            $nav->output('profile');
            $profile->output(1);
            $footer->output();
        }
        if ((preg_match($patternuserprofile, $_SERVER['REQUEST_URI']) == 1) and !$user)
        {
            $head->output('Авторизация');
            $body->output();
            $nav->output('auth');
            $auth->output();
            $footer->output();
        }
        if ($_SERVER['REQUEST_URI'] == '/anime')
        {
            $head->output('Аниме');
            $body->output();
            $nav->output('anime');
            $animeIndex->output();
            $footer->output();
        }
        if (preg_match($patternanimepage, $_SERVER['REQUEST_URI']) == 1)
        {
            $aid = $functions->getAnimeIdFromURI($_SERVER['REQUEST_URI']);
            echo $aid;
        }
        if ($_SERVER['REQUEST_URI'] == '/manga')
        {
            $head->output('Манга');
            $body->output();
            $nav->output('manga');
            $footer->output();
        }
        if (preg_match($patternanimegenres, $_SERVER['REQUEST_URI']) == 1)
        {
            echo 'работает';
        }
    }
}