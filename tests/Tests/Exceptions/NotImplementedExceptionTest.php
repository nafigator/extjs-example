<?php
namespace Tests\Exceptions;

use Exceptions\NotImplementedException;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-09-18 at 20:48:26.
 */
class NotImplementedExceptionTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var NotImplementedException
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
		new NotImplementedException;
		$msg = 'NotImplementedException::__construct() wrong behavior!';
		$this->assertSame(501, http_response_code(), $msg);
	}
}
