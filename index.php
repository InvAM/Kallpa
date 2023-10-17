<?php
error_reporting(E_ALL);
ini_set('ignore_repeated_errores', true);
ini_set('display_errors', FALSE);
ini_set('log_erroes', TRUE);
ini_set("error_log", "php-error.log");
error_log("Inicio de aplicacion web");

require_once "libs/database.php";
require_once "libs/controller.php";
require_once "libs/model.php";
require_once "libs/view.php";
require_once "libs/app.php";

require_once "config/config.php";

$app = new App();