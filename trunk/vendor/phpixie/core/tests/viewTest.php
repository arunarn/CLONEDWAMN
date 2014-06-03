<?php

/**
 * Generated by PHPUnit_SkeletonGenerator on 2013-02-05 at 09:23:37.
 */
class ViewTest extends PHPUnit_Framework_TestCase
{

	/**
	 * @var View
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
		$this->file = $file = tempnam(sys_get_temp_dir(), 'view');
		file_put_contents($file, '<?php $_($fairy); ?>');
		$pixie = $this->getMock("\\PHPixie\\Pixie", array('find_file'));
		$pixie->expects($this->once())
                 ->method('find_file')
                 ->will($this->returnValue($this->file));
		$this->object = new \PHPixie\View($pixie, $pixie->view_helper(), 'view');
	}

	/**
	 * @covers View::__set and View::__get
	 */
	public function test__set()
	{
		// Remove the following lines when you implement this test.
		$this->object->fairy = 'Tinkerbell';
		$this->assertEquals($this->object->fairy, 'Tinkerbell');
	}
	
	public function test__isset()
	{
		
		$this->assertEquals(false, isset($this->object->fairy));
		$this->object->fairy = 'Tinkerbell';
		$this->assertEquals(true, isset($this->object->fairy));
		$this->object->test = null;
		$this->assertEquals(true, isset($this->object->test));
		
	}
	
	/**
	 * @covers View::render
	 */
	public function testRender()
	{

		$this->object->fairy = 'Tinkerbell';
		$out = $this->object->render();
		$this->assertEquals('Tinkerbell', $out);
	}
	
	public function tearDown(){
		unlink($this->file);
	}

}
