<?php
/**
 * Created by PhpStorm.
 * User: Adriano
 * Date: 23/07/2016
 * Time: 13.51
 */

include("../static/config.php");

session_destroy();

header("Location: ../pages/index.php");