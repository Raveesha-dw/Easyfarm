<?php
// Load Config
require_once 'config/config.php';

// Load helpers
require_once 'helpers/URL_helper.php';
require_once 'helpers/Session_helper.php';

// Load libraries
//require_once 'libraries/Core.php';
//require_once 'libraries/Controller.php';
//require_once 'libraries/Database.php';

// Autoload Core Libraries
spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
});

