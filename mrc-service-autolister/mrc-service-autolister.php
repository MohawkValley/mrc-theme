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
 ****************************** */
global $DEBUG_MODE;
// if ($argv[1] === "debug") {
// 	$DEBUG_MODE = 1;
// 	print("\n............ CLI Debug Mode ............\n\n");
// }

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

// Create date objects to represent the targeted future dates. (Source of solution: user4446130 at stackoverflow.com/questions/1188728/get-the-date-of-next-monday-tuesday-etc)
global $nextSunday = new DateTime();
global $secondSunday = new DateTime();
global $thirdSunday = new DateTime();

// Find the next day following today that is a Sunday (or a certain number of the next Sundays, like maybe the next 3 Sundays -- maybe make this configurable)
$nextSunday->modify('next sunday');
$secondSunday->modify('second sunday');
$thirdSunday->modify('third sunday');

if ($DEBUG_MODE) { # Remove when removing debug code
	print("Date of next Sunday: ".$nextSunday->format('m-d-Y')."\n");
	print("Date of a week from next Sunday: ".$secondSunday->format('m-d-Y')."\n");
	print("Date of two weeks from next Sunday: ".$thirdSunday->format('m-d-Y')."\n\n");
}

// Output the next Sunday with a configurable note, with a configurable HTML structure

// Hook in to main front page,


/* ******************************
 * Functions for template output
 ******************************** */
/* This function actually places the HTML and content for the date list on the page. Calling this function is how the functionality of this plugin is invoked. To use this plugin, paste the following line into one of the PHP template files in your child theme (not your base theme). The <? and ?> aren't necessary if you happen to be pasting it into an existing PHP block.
	<?php mrc_the_date_list(); ?>
*/

function mrc_the_date_list() {
	?>
	<div class='plugin-wrap autolister'>
		<h3>Upcoming Services</h3>
		<ul>
			<li><?php echo $nextSunday->format('M. d, Y'); ?></li>
			<li><?php echo $secondSunday->format('M. d, Y'); ?></li>
			<li><?php echo $thirdSunday->format('M. d, Y'); ?></li>
		</ul>
	</div>
	<?php
}