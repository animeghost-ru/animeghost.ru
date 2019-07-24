<?php
$var['hash_algorithm'] = 'sha256';
$var['user_agent'] = htmlspecialchars($_SERVER['HTTP_USER_AGENT'], ENT_QUOTES, 'UTF-8');
$var['ip'] = $_SERVER['REMOTE_ADDR'];
$var['time'] = time();