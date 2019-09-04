<?php
session_start();
$http_referer = $_SERVER['HTTP_REFERER'];
session_destroy();
header('location: '.$http_referer);
?>
