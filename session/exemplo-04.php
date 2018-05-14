<?php 

session_id('fihi5s5qot632akmqirmg9cc73');

require_once("config.php");

session_regenerate_id();

echo session_id();

var_dump($_SESSION);

 ?>