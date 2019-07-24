<?php
include($_SERVER['DOCUMENT_ROOT'] . '/global_vars.php');
include($_SERVER['DOCUMENT_ROOT'] . '/db_functions.php');
include($_SERVER['DOCUMENT_ROOT'] . '/en.php');
include($_SERVER['DOCUMENT_ROOT'] . '/ru.php');
session_start();
class login
{
    function __login()
    {
        $db = new db;
        global $user;
        if ($user)
        {
            $this->mes('authorized', 'error');
        }
        if (empty($_POST['login']) or empty($_POST['pass']))
        {
            $this->mes('emptyvalues', 'error');
        }
        $_POST['login'] = mb_strtolower($_POST['login']);
        $query = $db->getUserIdNamePassByName($_POST['login']);
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
        global $language;
        die(json_encode(['err' => $err, 'mes' => $language[$_SESSION['selected']][$key], 'key' => $key]));
    }
}

$login = new login;
$login->__login();