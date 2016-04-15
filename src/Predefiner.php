<?php

namespace GGG\Config;

class Predefiner
{

	private $userappconfig;
	private $configarray;
	
	public function __construct()
	{
		$file = dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'user_app_config.php';
		if( file_exists( $file ) ) {
			$this->userappconfig = $file;
		}
		return $this;
	}
	
	public function set( $settings )
	{
		$configarray = require( $this->userappconfig );
		$this->configarray = array_merge( $configarray, $settings );
		if( $this->build() ) {
			return true;
		} else {
			return false;
		}
	}
	
	private function build()
	{
		$newfile = '&lt;?php' . "\n\n" . 'return array(' . "\n\t";
		foreach( $this->configarray as $index => $value ) {
			$const = strtoupper( $index );
			$newfile .= '&apos;' . $const . '&apos; =&gt; &apos;' . $value . '&apos;' . ",\n";
		}
		$newfile .= ');' . "\n\n";
		if( file_put_contents( $this->userappconfig, htmlspecialchars_decode( $newfile, ENT_QUOTES ) ) ) {
			return true;
		} else {
			return false;
		}
	}
	
	public function init()
	{
		def( $this->userappconfig );
	}
	
}