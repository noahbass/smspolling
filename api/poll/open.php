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
foreach($sms as $s) {
    // delete message
    $voice->deleteMessage($s->id);
}

$sms = $voice->getReadSMS();
foreach($sms as $s) {
    // delete message
    $voice->deleteMessage($s->id);
}


/**
 * clean out the old responses in the responses table
 */
$pdo->deleteFrom('responses')->execute();
