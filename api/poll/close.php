<?php

/**
 * poll/close
 *
 * close the poll
 */

print 'Closing the poll' . "\n";


/**
 * get the correct options for the calculation
 */
unset($argv[1]);

print 'Poll options:' . "\n";

$options = array();

foreach($argv as $item) {
    print ' - ' . $item . "\n";
    $options[] = array(
        'content' => $item,
        'votes' => 0
    );
}


/**
 * calculate the results
 */
$response = $pdo->from('responses')->fetchAll();

foreach($response as $item) {
    foreach($options as $index => $option) {
        if(strtolower($option['content']) == strtolower($item['content'])) {
            $options[$index]['votes']++;
        }
    }
}


/**
 * print the results
 */
print 'Total votes: ' . count($response) . "\n";

// sort the table, highest to lowest
usort($options, function($a, $b) {
    return $a['votes'] + $b['votes'];
});

// setup table display
$table = "| %-10.10s | %-5.5s | %-10.10s |\n";
printf($table, 'Content', 'Votes', 'Percentage');

foreach($options as $option) {
    $percentage = ($option['votes'] / count($response)) * 100 . '%';

    printf($table, $option['content'], $option['votes'], $percentage);
}
