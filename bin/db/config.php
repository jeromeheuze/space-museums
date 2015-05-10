<?php

if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "root";
    $dbname = "heuzep5_spacem";
} else {
    $dbhost = "localhost";
    $dbuser = "heuzep5_spacem";
    $dbpass = "vGbvrMZDdE7q";
    $dbname = "heuzep5_space-museums";
}
