<?php

include_once( __DIR__ . DIRECTORY_SEPARATOR . 'predefiner_helper.php' );

function def( $settings_array_file )
{
	$settings_array = require( $settings_array_file );
	if( predefiner_helper( $settings_array ) ) {
		return true;
	} else {
		return false;
	}
}