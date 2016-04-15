# Predefiner

[![Build Status](https://travis-ci.org/gavinggordon/predefiner.svg?branch=master)](https://travis-ci.org/gavinggordon/predefiner)

This class (GGG\Config\Predefiner) is a simple package to quickly and dynamically set PHP constants.

## Installation

	composer require gavinggordon/predefiner

## Examples

#### Instantiation:

	include_once( __DIR__ . '/vendor/autoload.php' );
	$predefiner = new \GGG\Config\Predefiner();

#### Setting:

	$predefiner->set( ['API_KEY' => 'abc123def456hij789klm0'] );
	
#### Initializing:

	$predefiner->init();
	
	echo API_KEY;
	// Result: 'abc123def456hij789klm0';
	
