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
		//$renewed = '&lt;?php' . "\n\n" . 'return array(' . "\n\t" . '&apos;' . 'DS' . '&apos; =&gt; &apos;' . 'DIRECTORY_SEPARATOR' . '&apos;' . ",\n\t" . '&apos;' . 'PS' . '&apos; =&gt; &apos;' . 'PATH_SEPARATOR' . '&apos;' . ",\n" . ');' . "\n";
		$oldfile = dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'user_app_config.php';
		$template = dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'user_app_configTemplate.php';
		//file_put_contents( $file,  html_entity_decode( $renewed ) );
		copy( $template, $oldfile );
	}
	
}
