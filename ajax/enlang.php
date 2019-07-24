<?php
session_start();
class enlang
{
    function changeLang()
    {
        if($_SESSION['selected'] != 'en')
        {
            $_SESSION['selected'] = 'en';
        }
    }
}
$change = new enlang;
$change->changeLang();