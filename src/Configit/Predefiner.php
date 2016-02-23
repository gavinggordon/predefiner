<?php

namespace Predefiner;

class Predefiner
{

	private $userappconfig;
	private $configarray;
	
	public function __construct()
	{
		if( file_exists( dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'user_app_config.php' ) ) {
			$this->userappconfig = dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'user_app_config.php';
		}
		//$this->configarray = array();
		return $this;
	}
	
	public function init( $settings = array() )
	{
		$configarray = require( $this->userappconfig );
		$this->configarray = array_merge( $configarray, $settings );
		if( $this->build() ) {
			return $this->userappconfig;
		}
	}
	
	private function build()
	{
		$newfile = '&lt;?php ' . "\n\n" . 'return array(' . "\n";
		foreach( $this->configarray as $index => $value ) {
			$newfile .= '&apos;' . strtoupper( $index ) . '&apos; => &apos;' . $value . '&apos;' . "\n";
		}
		$newfile .= ');' . "\n";
		if( file_put_contents( $this->userappconfig, html_entity_decode( $newfile ) ) ) {
			return true;
		} else {
			return false;
		}
	}
	
}
