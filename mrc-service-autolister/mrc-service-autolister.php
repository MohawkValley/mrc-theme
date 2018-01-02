<?php
/*
	Plugin Name: Weekly Service Autolister for MRC
	Description: Finding the most recent upcoming Sundays and listing them automatically on the front end, unless a setting on the back end for a particular upcoming date is selected
	Version: 0.1
	Author: Strivenword
*/

/* ****************************
 * CLI Debug mode
 * Remove all associated debug code before publishing plugin on public website!
 ************** */
global $DEBUG_MODE;
if ($argv[1] === "debug") {
	$DEBUG_MODE = 1;
	print("\n............ CLI Debug Mode ............\n\n");
}

// Security precaution suggested by codex.wordpress.org/Writing_a_Plugin
if (!$DEBUG_MODE) { # Remove the condition when removing debug code
	defined( 'ABSPATH' ) or die( 'Only internal PHP scripts allowed.' );
}

// Set the default timezone to Eastern Standard Time
date_default_timezone_set('America/New_York');

if ($DEBUG_MODE) { # Remove when removing debug code
	$tzone = date_default_timezone_get();
	print("Default time zone: ".$tzone."\n\n");
}

// Find today's date

// Find the next day following today that is a Sunday (or a certain number of the next Sundays, like maybe the next 3 Sundays -- maybe make this configurable)

// Output the next Sunday with a configurable note, with a configurable HTML structure