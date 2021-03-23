<?php
if (!isset($_SESSION)) {
    session_start();
}
$errors = array();
$db = mysqli_connect('localhost', 'root', '', 'WeTweet') or die("Connection Failed"); ?>
