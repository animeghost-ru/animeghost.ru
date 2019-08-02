<?php


class functions
{
    function __auth()
    {
        global $var, $user;
        $db = new db;
            if (random_int(1, 1000) == 1) {
                $db->deleteSessionFromSessionsWhereTime(time());
            }
        if ($_SESSION['sess'] != NULL) {
            $query = $db->getIdUidHashFromSessions($var);
            if ($query->rowCount() != 1) {
                $this->deleteSession();
                return;
            }
            $session = $query->fetch();
            $db->updateUsersLastActivity($session['uid'], $var['time']);
            $query = $db->getUser($session['uid']);
            if ($query->rowCount() != 1) {
                $this->deleteSession();
                return;
            }
            $row = $query->fetch();
                if (random_int(1, 10) == 1) {
                    $tmp = $var['time'] + 60 * 60 * 24 * 30;
                    $db->updateSessionsTime($session['uid'], $tmp);
                }
            $user = [
                'id' => $row['id'],
                'access' => $row['access'],
                'name' => $row['name'],
                'mail' => $row['mail'],
                'last_activity' => $row['last_activity'],
                'level' => $row['level'],
                'online' => $row['online'],
                'firstname' => $row['firstname'],
                'prefered_language' => $row['prefered_language'],
                'surname' => $row['surname'],
                'watched' => $row['watched'],
                'readed' => $row['readed'],
                'dir' => md5($row['id']),
            ];
        }
    }

    function deleteSession()
    {
        global $var;
        $db = new db;
        if(session_status() != PHP_SESSION_NONE){
            if(!empty($_SESSION['sess'])){
                $db->deleteSessionFromSessionsWhereHash();
            }
            $params = session_get_cookie_params();
            setcookie(session_name(), '', $var['time'] - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
            session_unset();
            session_destroy();
            if(strpos($var['user_agent'], 'mobileApp') === false){
                header("Location: https://".$_SERVER['SERVER_NAME']);
            }
            unset($user);
        }
    }
    function sessionHandler()
    {
        if(isset($_COOKIE['PHPSESSID']) && !preg_match('/^[-,a-zA-Z0-9]{22,64}$/', $_COOKIE['PHPSESSID'])){
            setcookie('PHPSESSID', '', time() - 86400, '/', $_SERVER['SERVER_NAME'], true, true);
            unset($_COOKIE['PHPSESSID']);
            return;
        }
        $lifetime = 60*60*24*30;
        session_set_cookie_params($lifetime, '/', $_SERVER['SERVER_NAME'], true, true);
        session_start();
        if(empty($_SESSION['secret'])){
            $_SESSION['secret'] = bin2hex(random_bytes(32));
        }
        if(random_int(1, 10) == 1){
            setcookie(session_name(), session_id(), time()+$lifetime, '/', $_SERVER['SERVER_NAME'], true, true);
        }
    }
    function createGenresArrayFromString($genres)
    {
        return explode(',', substr($genres, 1, strlen($genres) - 2));
    }
    function createUrlArrayFromUri($uri)
    {
        $count = 0;
        $result = [];
        for($i = 0; $i<strlen($uri); $i++){
            if (($i == 0) and ($uri[0] == '/')){

            }
            elseif (($i == strlen($uri)-1) and ($uri[strlen($uri)-1] == '/')){

            }
            elseif ($uri[$i] != '/'){
                $result[$count] .= $uri[$i];
            }
            elseif ($uri[$i] == '/'){
                $count+=1;
            }
        }
        return $result;
    }
    function averageTimeLeft($row)
    {
        $count = $row->rowCount();
        $summ = 0;
        for($i = 0; $i<$count; $i++){
            $row2 = $row->fetch();
            $summ += $row2['timeleft'];
        }
        $average = $summ/$count;
        return $average;
    }
}