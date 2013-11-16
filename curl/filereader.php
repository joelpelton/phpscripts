<?php
/**
 * This is an example of regular expressions... AND file reading/output
 */
$filename = "contacts.txt";
$handle = fopen($filename, "r");

while (!feof($handle)) {
    $url = fgets($handle);

    if (preg_match("/^([0-9]{3}(-|\.)[0-9]{3}(-|\.)[0-9]{4}|[0-9]{10})$/", $url)) {
        echo 'The phone number--' . $url . '--is valid<br>';
    } else {
        echo 'This number--' . $url . '-- is INVALID<br>';
    }
}
fclose($handle);
?>
