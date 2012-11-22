<?php

require_once("../smarty/Smarty.class.php");

require_once("../log4php/Logger.php");
Logger::configure("app/config/log4php_config.xml");

require_once("app/core/autoload.php");
spl_autoload_register("myAutoload");

$controller = new FrontController();
$controller->handleRequest();
?>