<?php

use GGG\Config\Predefiner;

class PredefinerTest extends \PHPUnit_Framework_TestCase
{

	public $predefiner;
	
	public function __construct()
	{
		$this->predefiner = new Predefiner();
		$this->asserFileExists( dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'user_app_config.php' );
	}

	public function testSet()
    {
		$result = $this->predefiner->set( ['TEST_CONST'=>'test'] );
        $this->assertTrue( $result );
    }
	
	public function testConstant()
    {
        $this->assertSame( 'test', TEST_CONST );
    }
	
	public function __destruct()
	{
		$renewed = "&lt;?php\n\nreturn array(\n\t&apos;DS&apos; =&gt; &apos;DIRECTORY_SEPARATOR&apos;,\n\t&apos;PS&apos; =&gt; &apos;PATH_SEPARATOR&apos;,\n);\n";
		file_put_contents( dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'user_app_config.php',  html_entity_decode( $renewed ) );
	}
	
}
