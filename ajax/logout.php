<?php
include($_SERVER['DOCUMENT_ROOT'] . '/global_vars.php');
include($_SERVER['DOCUMENT_ROOT'] . '/functions.php');
include($_SERVER['DOCUMENT_ROOT'] . '/en.php');
include($_SERVER['DOCUMENT_ROOT'] . '/ru.php');
include($_SERVER['DOCUMENT_ROOT'] . '/views/connect.php');
include($_SERVER['DOCUMENT_ROOT'] . '/connector.php');
include($_SERVER['DOCUMENT_ROOT'] . '/db.php');
session_start();
$functions = new functions;
$functions->deleteSession();
