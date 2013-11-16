<?php
/**
 * Goal: To read urls from a file, and run a search query and retrieve all
 * results. I want to try this same functionality except with python and run
 * a test to see which one executes the 'scrape' faster.
 *
 * This file is an example of regular expressions, and file reading/output...
 * the goal is to add the curl functionality tomorrow. I just wanted to dom
 * the file reading & regex for today.
 */

// first, define the file info
$urlFile = "urls.txt";
// open the file for reading
$handle = fopen($urlFile, "r");

// run a loop, the only arg is if it's the end of file, stop reading the file
while (!feof($handle)) {
	// fgets goes line-by-line
	$url = fgets($handle);
	// if the line is a valid URL, then lets scrape it.. if not, just let it be
	if (preg_match("/^(http:\/\/+[\w\-]+\.[\w\-]+)/i", $url)) {
		echo 'Retrieving from ... ' . $url . '<br>';
	}
} // close while loop

// close file
fclose($handle);
?>
