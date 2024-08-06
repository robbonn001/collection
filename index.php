<?php

require_once 'Helper/Route.php';
// require_once 'Helper/Debug.php';
require_once 'Helper/Lib.php';

session_start();
Route::splitURL();

//$url = "?route=main/index";