<?php

/**
 * responses/foo
 *
 * get the poll responses
 */

print 'Listing response(s)' . "\n";


/**
 * print responses
 */
$response = $pdo->from('responses')->fetchAll();

print count($response) . ' response(s):' . "\n";

print json_encode($response, JSON_PRETTY_PRINT) . "\n";
