# Predefiner

[![Build Status](https://travis-ci.org/gavinggordon/predefiner.svg?branch=master)](https://travis-ci.org/gavinggordon/predefiner)
[![Packagist Version](https://img.shields.io/packagist/v/gavinggordon/predefiner.svg)](https://packagist.com/gavinggordon/predefiner)
[![Github Release](https://img.shields.io/github/release/gavinggordon/predefiner.svg)](https://github.com/gavinggordon/predefiner/master)
[![Usage License](https://img.shields.io/github/license/gavinggordon/predefiner.svg)](https://github.com/gavinggordon/predefiner/blob/master/LICENSE.txt)

## Description

This class (GGG\Config\Predefiner) is a simple package to quickly and dynamically set PHP constants.

## Usage

### Installation

```shellscript
	composer require gavinggordon/predefiner
```

### Examples

#### Instantiation:

```php
	include_once( __DIR__ . '/vendor/autoload.php' );
	
	$predefiner = new \GGG\Config\Predefiner();
```

#### Setting:

```php
	$predefiner->set( ['API_KEY' => 'abc123def456hij789klm0'] );
```

#### Initializing:

```php
	$predefiner->init();
	
	echo API_KEY;
	// Result: 'abc123def456hij789klm0';
```

#### Issues

If you have any issues at all, please post your findings in the issues page at [https://github.com/gavinggordon/predefiner/issues](https://github.com/gavinggordon/predefiner/issues).

#### License

This package utilizes the MIT License.
