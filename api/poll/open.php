<?php

/**
 * poll/open
 *
 * open the poll
 */

print 'Opening the poll' . "\n";


/**
 * clean out old messages in google voice
 */
$sms = $voice->getUnreadSMS();
$count = 0;

foreach($sms as $s) {
    // delete message
    $voice->deleteMessage($s->id);
    $count++;
}

$sms = $voice->getReadSMS();
foreach($sms as $s) {
    // delete message
    $voice->deleteMessage($s->id);
    $count++;
}

print $count . ' messages deleted' . "\n";


/**
 * clean out the old responses in the responses table
 */
$pdo->deleteFrom('responses')->execute();

print 'Responses cleaned' . "\n";
