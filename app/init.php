<?php
// for call Const, librari, API, helper, Model, Controllers

// All Const
require_once "config/config.php";

// Library
require_once "libraries/faker/fakerfunc.php";
require_once "libraries/PHPMailer/@kirim_email_pendaftaran.php";

// Api
require_once "api/whatsapp/wa_login_system.php";

// helpers
require_once "helpers/PhoneHelper.php";

// All Class in core With Autoloading
spl_autoload_register(function($class){
    $class = explode("\\", $class);
    $class = end($class);
    require_once __DIR__ . "/core/$class.php";
});

// All Class in controllers With Autoloading
spl_autoload_register(function($class){
    $class = explode("\\", $class);
    $class = end($class);
    require_once __DIR__ . "/controllers/$class.php";
});