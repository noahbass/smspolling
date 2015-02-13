<?php

/**
 * db/migrate
 *
 * migrate the database
 */

print 'Migrating the database' . "\n";

/**
 * create tables in the database
 */
$db = new SQLite3('db.db');

$db->exec('DROP TABLE IF EXISTS responses');
print 'Dropped tables' . "\n";

$db->exec('CREATE TABLE responses (content varchar(255), phone varchar(255))');
print 'Table responses has been created' . "\n";
