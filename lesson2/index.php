<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

/*require_once('../vendor/autoload.php');

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('my_log');
$log->pushHandler(new StreamHandler('log/my.log', Logger::DEBUG));


// Task 1.
$memory_usage = 0;

for ($n = 1; $n <= 20; $n++) {
    $time_start = round(microtime(true) * 1000);
    //echo fibonacci($n) . PHP_EOL;
    echo $n . "<br>";
    $time_end = round(microtime(true) * 1000);

    $usage = memory_get_usage();

    //echo ($time_end - $time_start);
    $log->debug("Time left: " . ($time_end - $time_start) . " Memory used: " . $usage . " Memory delta: +" . ($usage - $memory_usage));
    $memory_usage = $usage;
}*/


//Task 2.
deep_end( 1 );

function deep_end( $count ) {
    // добавляем 1 к параметру count
    $count += 1;
    if ( $count < 48 ) {
        deep_end( $count );
    }
    else {
        trigger_error( "going off the deep end!" );
    }
}
