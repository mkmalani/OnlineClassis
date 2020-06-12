<?php

$error='';
$conn=new mysqli("localhost","root","","classis_app");

define('servername','Online Class');

define('email_server','admin@kmphasisinfotech.com');

define('client_email','mayur.kmphasis@gmail.com');

$aconst=(isset($_SERVER['HTTPS']) ? "https://" : "http://");

define('server_url',$aconst.$_SERVER['HTTP_HOST']."/OnlineClass/");

define('logo',server_url."/assets/images/logo.png");

define('favicon_logo',server_url."assets/images/logo.png");
?>