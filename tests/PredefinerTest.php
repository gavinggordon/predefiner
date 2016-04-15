<?php

use GGG\Config\Predefiner;

class PredefinerTest extends \PHPUnit_Framework_TestCase
{

	public $predefiner;
	
	public function __construct()
	{
		$file = dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'user_app_config.php';
		$this->predefiner = new Predefiner();
		$this->assertFileExists( $file );
	}

	public function testSet()
    {
		$result = $this->predefiner->set( [ 'TEST_CONST' => 'test' ] );
        $this->assertTrue( $result );
    }
	
	public function testInit()
    {
		$this->predefiner->init();
        $this->assertSame( 'test', TEST_CONST );
    }
	
	public function __destruct()
	{
		$oldfile = dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'user_app_config.php';
		$template = dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'user_app_configTemplate.php';
		copy( $template, $oldfile );
	}
	
}
