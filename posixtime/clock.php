<?php
// posix time clock
//
// ----------------------------------------------------------------
// The contents of this file are distributed under the CC0 license.
//  See http://creativecommons.org/publicdomain/zero/1.0/
// ----------------------------------------------------------------

// Set response content type
header('Content-type: text/plain');

// Set UTC time mode
date_default_timezone_set("UTC");

// Return epoch time
// http://en.wikipedia.org/wiki/Unix_time
echo time();
?>
