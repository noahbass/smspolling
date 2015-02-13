<?php

/**
 * responses/get
 *
 * get the poll responses
 */

print 'Getting and saving new responses' . "\n";


/**
 * get the new poll responses and insert them into the responses table
 * only if the phone number is not in the table
 */
$sms = $voice->getUnreadSMS();

$count = 0;

foreach($sms as $s) {
    // mark the message as read in google voice
    $voice->markMessageRead($s->id);

    // insert the message into the database as a response,
    // if the phone number is not already in databse for this poll
    $found = $pdo->from('responses')
        ->where('phone', $s->phoneNumber)
        ->limit(1);

    if(count($found) == 0) {
        $pdo->insertInto('responses', array(
            'content' => $s->messageText,
            'phone'   => $s->phoneNumber
        ))->execute();
    }

    $count++;
}

print 'Got ' . $count . ' new response(s)' . "\n";
