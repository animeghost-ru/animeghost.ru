<?
session_start();
class rulang
{
    function changeLang()
    {
        if($_SESSION['selected'] != 'ru')
        {
            $_SESSION['selected'] = 'ru';
        }
    }
}
$change = new rulang;
$change->changeLang();