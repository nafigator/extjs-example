<?php
namespace Tests\Models;

use Models\Banners;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-09-18 at 21:29:23.
 */
class BannersTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var Banners
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
		$this->object = new Banners;
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown()
	{
	}

	/**
	 * @covers Models\Banners::__construct
	 */
	public function testConstruct()
	{
		$expected = realpath(__DIR__ . '/../../../data');
		$msg = 'Banners::__construct() wrong behavior!';
		$this->assertAttributeSame($expected, 'dir', $this->object, $msg);

		$expected = realpath(__DIR__ . '/../../../data') . '/banners.csv';
		$this->assertAttributeSame($expected, 'path', $this->object, $msg);
	}

	/**
	 * @covers       Models\Banners::read
	 *
	 * @dataProvider readProvider
	 *
	 * @param $expected
	 */
	public function testRead($expected)
	{
		$this->object->setStart(5);
		$this->object->setOffset(5);

		$actual = $this->object->read();
		$msg = 'Banners::read() returns wrong result!';
		$this->assertSame($expected, $actual, $msg);
	}

	public function readProvider()
	{
		return [
			[
				[
					0 => [
						0 => 2707999,
						1 => 10629534,
						2 => 'Вы пенсионер?',
						3 => 1969397,
						4 => 1383,
						5 => 13377.66,
					],
					1 => [
						0 => 2707999,
						1 => 12945803,
						2 => 'Вы пенсионер?',
						3 => 2686659,
						4 => 1199,
						5 => 13025.82,
					],
					2 => [
						0 => 4404517,
						1 => 13653531,
						2 => '',
						3 => 410747,
						4 => 1721,
						5 => 10136.370000000001,
					],
					3 => [
						0 => 3918759,
						1 => 12883276,
						2 => 'Вы пенсионер?',
						3 => 2427448,
						4 => 952,
						5 => 9601.2299999999996,
					],
					4 => [
						0 => 2707999,
						1 => 12945804,
						2 => 'Вы пенсионер?',
						3 => 2330245,
						4 => 904,
						5 => 9528.5900000000001,
					],
				]
			]
		];
	}

	/**
	 * @covers Models\Banners::setStart
	 *
	 * @param $data
	 * @param $expected
	 *
	 * @dataProvider startProvider
	 */
	public function testSetStart($data, $expected)
	{
		$actual = $this->object->setStart($data);
		$msg = 'Banners::setStart() return wrong result!';
		$this->assertSame($this->object, $actual, $msg);

		$msg = 'Banners::setStart() wrong behavior!';
		$this->assertAttributeSame($expected, 'start', $this->object, $msg);
	}

	public function startProvider()
	{
		return [
			[100, 100],
			[null, 0],
			[10, 10]
		];
	}

	/**
	 * @covers       Models\Banners::setOffset
	 *
	 * @dataProvider offsetProvider
	 *
	 * @param $data
	 * @param $expected
	 */
	public function testSetOffset($data, $expected)
	{
		$actual = $this->object->setOffset($data);
		$msg = 'Banners::setOffset() return wrong result!';
		$this->assertSame($this->object, $actual, $msg);

		$msg = 'Banners::setOffset() wrong behavior!';
		$this->assertAttributeSame($expected, 'offset', $this->object, $msg);
	}

	public function offsetProvider()
	{
		return [
			[100, 100],
			[null, 25],
			[10, 10]
		];
	}

	/**
	 * @covers       Models\Banners::fixTypes
	 *
	 * @dataProvider fixTypesProvider
	 *
	 * @param $key
	 * @param $value
	 * @param $expected
	 */
	public function testFixTypes($key, $value, $expected)
	{
		$actual = $this->object->fixTypes($key, $value);

		$msg = 'Banners::fixTypes() returns wrong result!';
		$this->assertSame($expected, $actual, $msg);
	}

	public function fixTypesProvider()
	{
		return [
			[0, '123', 123],
			[1, '234', 234],
			[2, 234, '234'],
			[3, '1234', 1234],
			[4, '300', 300],
			[5, '23,23', 23.23]
		];
	}


	/**
	 * @covers       Models\Banners::fixTypes
	 *
	 * @dataProvider fixTypesExceptionProvider
	 *
	 * @expectedException \Exceptions\RuntimeException
	 *
	 * @param $key
	 * @param $value
	 */
	public function testFixTypeException($key, $value)
	{
		$this->object->fixTypes($key, $value);
	}

	public function fixTypesExceptionProvider()
	{
		return [
			[7, '234'],
			[500, '2345']
		];
	}

	/**
	 * @covers Models\Banners::getTotalLines
	 */
	public function testGetTotalLines()
	{
		$expected = 9100;

		$actual = $this->object->getTotalLines();
		$msg = 'Banners::getTotalLines() returns wrong result!';
		$this->assertSame($expected, $actual, $msg);
	}
}