<?php

namespace GGG\Config;

class Predefiner
{

	private $userappconfig;
	private $configarray;
	
	public function __construct()
	{
		$file = dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'user_app_config.php';
       $template = dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'user_app_configTemplate.php';
       @copy( $template, $file );
       $this->userappconfig = $file;
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
       $i = 0;
       $configarray = array_unique( $this->configarray );
		$newfile = '<?php' . "\n\n" . 'return array(' . "\n\t";
		foreach( $configarray as $index => $value ) {
          $strend = ( $i == count( $this->configarray ) - 1 ) ? "\n" : ",\n\t";
			$const = preg_replace( '/[^a-z0-9\_]+?/i', '_', strtoupper( $index ) );
			$newfile .= "'{$const}' => '{$value}'" . $strend;
          $i++;
		}
		$newfile .= ");" . "\n\n";
      if( file_put_contents( $this->userappconfig, $newfile ) ) 
      {
			return true;
		} else {
			return false;
		}
	}

   private function define_many( $constants )
   {
     if( is_array( $constants ) && count( $constants ) >= 1 )
     {
       foreach( $constants as $constant => $definition )
       {
         if(! defined( $constant ) )
         {
           define( $constant, $definition );
         }
       }
     }
   }
	
	public function init()
	{
      $constants = require( $this->userappconfig );
      $this->define_many( $constants );
	}
	
}