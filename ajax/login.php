<?
include($_SERVER['DOCUMENT_ROOT'] . '/global_vars.php');
include($_SERVER['DOCUMENT_ROOT'] . '/db.php');
include($_SERVER['DOCUMENT_ROOT'] . '/en.php');
include($_SERVER['DOCUMENT_ROOT'] . '/ru.php');
session_start();
class login
{
    function genRandStr($length = 10, $mode = 2)
    {
        $str = '';
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        if ($mode == 2) {
            $chars .= '~!@#$%^&*()_+-=';
        }
        for ($i = 0; $i < $length; $i++) {
            try {
                $str .= $chars[random_int(0, strlen($chars) - 1)];
            } catch (Exception $e) {
            }
        }
        return $str;
    }

    function half_string_hash($s)
    {
        global $var;
        return hash($var['hash_algorithm'], substr($s, round(strlen($s) / 2)));
    }

    function sesshash($login, $pass, $rand = '')
    {
        global $var;
        if (empty($rand)) {
            $rand = $this->genRandStr(8);
        }
        return [$rand . hash($var['hash_algorithm'], $rand . $var['user_agent'] . $login . sha1($this->half_string_hash($pass))), $var['time'] + 60 * 60 * 24 * 30];
    }

    function sessionStart($row)
    {
        global $var;
        $db = new db;
        $hash = $this->sesshash($row['name'], $row['passhash']);
        $db->insertSessionIntoSessions($row, $hash, $var);
        $_SESSION['sess'] = $hash[0];
        $db->updateUsersLastActivity($row['id'], $var['time']);
    }

    function mes($key, $err = 'ok')
    {
        global $language;
        die(json_encode(['err' => $err, 'mes' => $language[$_SESSION['selected']][$key], 'key' => $key]));
    }
    function __login()
    {
        $db = new db;
        global $user;
        if ($user) {
            $this->mes('authorized', 'error');
        }
        if (empty($_POST['login']) or empty($_POST['pass'])) {
            $this->mes('emptyvalues', 'error');
        }
        $_POST['login'] = mb_strtolower($_POST['login']);
        $query = $db->getUserIdNamePassByName($_POST['login']);
        if ($query->rowCount() == 0) {
            $this->mes('unknownuser', 'error');
        }
        $row = $query->fetch();
        if (!password_verify($_POST['pass'], $row['passhash'])) {
            $this->mes('invalidpass', 'error');
        }
        $this->sessionStart($row);
        $this->mes('success');
    }
}

$login = new login();
$login->__login();