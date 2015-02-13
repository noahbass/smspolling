<?php

include 'vendor/autoload.php';

Dotenv::load(__DIR__);

include 'libs/Google-Voice-PHP-API/GoogleVoice.php';

// initialize GoogleVoice
$voice = new GoogleVoice(getenv('EMAIL'), getenv('PASSWORD'));

// connect to database
$pdo = new PDO('sqlite:' . getenv('DB'));
$pdo = new FluentPDO($pdo);

// remove './app' from the args list
unset($argv[0]);

print 'Calling api/' . $argv[1] . '.php' . "\n";

// include the correct api file
include 'api/' . $argv[1] . '.php';
