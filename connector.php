<?php


class connector
{
    function routes($oop)
    {
        global $user;
        $url = $oop['functions']->createUrlArrayFromUri($_SERVER['REQUEST_URI']);

        if ($url[0] == '')
        {
            $oop['head']->output('Главная');
            $oop['body']->output();
            $oop['nav']->output('index');
            $oop['footer']->output();
        }
        elseif ($url[0] == 'auth')
        {
            $oop['head']->output('Авторизация');
            $oop['body']->output();
            $oop['nav']->output('auth');
            $oop['auth']->output();
            $oop['footer']->output();
        }
        elseif (($url[0] == 'profile') and ($url[1] != null) and ($user))
        {
            $customuser = $oop['db']->getUser($url[1]);
            $mode = 2;
            if ($customuser->rowCount() == 0){$mode = 3; $title = 'Такого пользователя несуществует!';}
            $customuser = $customuser->fetch();
            if ($mode == 2){$title = 'Профиль пользователя - '.$customuser['name'];}
            $oop['head']->output('Профиль пользователя - '.$customuser['name']);
            $oop['body']->output();
            $oop['nav']->output('profile');
            $oop['profile']->output($mode, $customuser);
            $oop['footer']->output();
        }
        elseif (($url[0] == 'profile') and ($url[1] != null) and (!$user))
        {
            $customuser = $oop['db']->getUser($url[1]);
            $mode = 2;
            $title = '';
            if ($customuser->rowCount() == 0){$mode = 3; $title = 'Такого пользователя несуществует!';}
            $customuser = $customuser->fetch();
            if ($mode == 2){$title = 'Профиль пользователя - '.$customuser['name'];}
            $oop['head']->output($title);
            $oop['body']->output();
            $oop['nav']->output('profile');
            $oop['profile']->output($mode, $customuser);
            $oop['footer']->output();
        }
        elseif (($url[0] == 'profile') and ($url[1] == null) and ($user))
        {
            $oop['head']->output('Ваш профиль');
            $oop['body']->output();
            $oop['nav']->output('profile');
            $oop['profile']->output(1);
            $oop['footer']->output();
        }
        elseif (($url[0] == 'profile') and ($url[1] == null) and (!$user))
        {
            $oop['head']->output('Авторизация');
            $oop['body']->output();
            $oop['nav']->output('auth');
            $oop['auth']->output();
            $oop['footer']->output();
        }
        elseif (($url[0] == 'anime') and !(isset($url[1])))
        {
            $row = $oop['db']->getAnimeCardsFromAnime();
            $oop['head']->output('Аниме');
            $oop['body']->output();
            $oop['nav']->output('anime');
            $oop['animeIndex']->output($row);
            $oop['footer']->output();
        }
        elseif (($url[0]) == 'anime' and $url[1] == 'genres'){
            $row = $oop['db']->getAnimeCardsFromAnime($url['2']);
            $oop['head']->output('Аниме');
            $oop['body']->output();
            $oop['nav']->output('anime');
            $oop['animeIndex']->output($row);
            $oop['footer']->output();
        }
        elseif (($url[0] == 'anime') and (isset($url[1])) and !(isset($url[2])))
        {
            $row = $oop['db']->getAnimeNameFromAnime($url[1])->fetch();
            //if ($row->rowCount() == 0){echo 'lol';$row->fetch();}else{$row->fetch();}
            $oop['head']->output($row['name']);
            $oop['body']->output();
            $oop['nav']->output('anime');
            $oop['animePage']->output($row);
            $oop['footer']->output();
        }
        elseif ($url[0] == 'manga')
        {
            $oop['head']->output('Манга');
            $oop['body']->output();
            $oop['nav']->output('manga');
            $oop['footer']->output();
        }
        else
        {
            $oop['head']->output('Упс... 404');
            $oop['body']->output();
            $oop['nav']->output();
            echo '404';
            $oop['footer']->output();

        }
    }
}