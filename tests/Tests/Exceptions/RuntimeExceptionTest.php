<?php
namespace Tests\Exceptions;

use Exceptions\RuntimeException;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-09-18 at 20:49:47.
 */
class RuntimeExceptionTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var RuntimeException
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown()
	{
	}

	public function testConstruct()
	{
		$expected = $message = 'Error message';

		$exception = new RuntimeException($message);
		$msg = 'RuntimeException::__construct() wrong behavior!';
		$this->assertSame(500, http_response_code(), $msg);

		$result = $exception->getMessage();
		$this->assertSame($expected, $result, $msg);
	}
}
