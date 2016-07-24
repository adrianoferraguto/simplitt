<?php
/**
 * Created by PhpStorm.
 * User: Adriano
 * Date: 17/07/2016
 * Time: 23.27
 */

// Debug mode
$debug = false;

// Global webapp parametres
$sitename = "Simplitt";

// Server parametres
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "progettoDB";

include("connection.php");
if(!isset($recurring) or $recurring===false) { include("libs.php"); };

// SESSION superglobal start (only if there's no recurring)
if(!isset($recurring) or $recurring===false) { session_start(); };