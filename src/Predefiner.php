<?php

namespace GGG\Config;

class Predefiner
{

	private $userappconfig;
	private $configarray;
	
	public function __construct()
	{
		if( file_exists( dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'user_app_config.php' ) ) {
			$this->userappconfig = dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'user_app_config.php';
		}
		return $this;
	}
	
	public function set( $settings = array() )
	{
		$configarray = require( $this->userappconfig );
		$this->configarray = array_merge( $configarray, $settings );
		if( $this->build() ) {
			if( $this->init() ) {
				return true;
			} else {
				return false;
			}
		}
	}
	
	private function build()
	{
		$newfile = "&lt;?php\nreturn array(\n\t";
		foreach( $this->configarray as $index => $value ) {
			$const = strtoupper( $index );
			$newfile .= "&apos;$const&apos; =&gt; &apos;$value&apos;,\n";
		}
		$newfile .= ");\n";
		if( file_put_contents( $this->userappconfig, html_entity_decode( $newfile ) ) ) {
			return true;
		} else {
			return false;
		}
	}
	
	private function init()
	{
		if( def( $this->userappconfig ) ) {
			return true;
		} else {
			return false;
		}
	}
	
}