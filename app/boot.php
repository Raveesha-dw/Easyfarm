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

// spl_autoload_register(function($className){
//     // Define the base directory for the namespace prefix
//     $baseDir = __DIR__ . '/libraries/';

//     // Convert the class name to a relative file path
//     $fileName = $baseDir . str_replace('\\', '/', $className) . '.php';

//     // If the file exists, require it
//     if (file_exists($fileName)) {
//         require $fileName;
//     }
// });

