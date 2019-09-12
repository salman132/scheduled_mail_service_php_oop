<?php

require_once('includes/init.php');

$session->logout($_SESSION['user_id']);

redirect('login.php');
die('Hacker Its Not Your Day');
?>