<?php
// DB params
define('DB_HOST', 'localhost:3306');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'easyfarm');

// App Root
define('APPROOT', dirname(dirname(__FILE__)));

//URL Root
define('URLROOT', 'http://localhost/Easyfarm');

//Site name
define('SITENAME', 'Easyfarm');
// define('return_url','http://localhost/Easyfarm/Users/login');


//Mail setting
define('Mail_Host', 'smtp.elasticemail.com');
define('Mail_Username','easyfarm123@mail.com');
define('Mail_Password','2B780F58D47E2A5866CC1DC9DECA11454EE0');
define('Mail_port','Port');
define('PUBROOT', dirname(dirname(dirname(__FILE__))).'\public');

// paymentgateway - merchant secret key
define('MERCHANT_SECRET', 'Mzg2NjE0MzgyMjk4MDI4MzQ0MjE4MjYwMTE0NDAyMjkyNTU3NTA3');


?>
