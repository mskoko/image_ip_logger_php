<?php

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *   file                 :  includes.php
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *   author               :  Muhamed Skoko - mskoko.me@gmail.com
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('error_log', 'dev/logs/errors.log'); // Logging file path
error_reporting(E_ALL | E_STRICT | E_NOTICE);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
} ob_start();

date_default_timezone_set('Europe/Belgrade');

// URL =  for global path url
$url = $_SERVER['DOCUMENT_ROOT'];

// Configuration Files
include_once($url.'/core/inc/config.php');         			// MySQL Config File

// Classes
include_once($url.'/core/class/db.class.php'); 				// MySQL Managment Class
include_once($url.'/core/class/secure.class.php');    		// Secure Managment Class


// Initializing Classes
$DataBase 	= new DataBase();
$Secure 	= new Secure();

//For test;
function pre_r($Array) {
	echo '<pre>';
	print_r($Array);
	echo '</pre>';
}

$POST 	= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
$GET 	= filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

$user_agent = $_SERVER['HTTP_USER_AGENT'];