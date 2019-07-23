<?php

include($_SERVER['DOCUMENT_ROOT'] . '/global_vars.php');
class login
{
    function login()
    {
        $pdo = new PDO('pgsql:host=pg.sweb.ru;port=5432;dbname=amarylliso', 'amarylliso', 'Mesina226');
        global $user;
        if ($user)
        {
            $this->mes('authorized', 'error');
        }
        if (empty($_POST['login']) or empty($_POST['pass']))
        {
            $this->mes('empty', 'error');
        }
        $_POST['login'] = mb_strtolower($_POST['login']);
        $query = $pdo->prepare('SELECT id, name, passhash FROM users WHERE name = :name');
        $query->bindParam(':name', $_POST['login']);
        $query->execute();
        if($query->rowCount() == 0)
        {
            $this->mes('unknownuser', 'error');
        }
        $row = $query->fetch();
        if(!password_verify($_POST['pass'], $row['passhash']))
        {
            $this->mes('invalidpass', 'error');
        }
        $this->mes('success');
    }
    function mes($key, $err = 'ok')
    {
        global $var;
        die(json_encode(['err' => $err, 'mes' => $var['error'][$key], 'key' => $key]));
    }
}

$login = new login;
$login->login();