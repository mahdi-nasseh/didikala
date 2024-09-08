<?php
session_start();
require_once 'Config/config.php';
include "Function/toJalali.php";
global $DIR;
require $DIR . '/vendor/autoload.php';
require_once 'Config/DB.php';
