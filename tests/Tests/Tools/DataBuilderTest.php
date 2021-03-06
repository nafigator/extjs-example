<?php
namespace Tests\Tools;

use Models\Banners;
use Models\Campaigns;
use Tools\DataBuilder;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-09-18 at 21:04:24.
 */
class DataBuilderTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var DataBuilder
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
		$banners = (new Banners)
			->setStart(0)
			->setOffset(5);

		$this->object = new DataBuilder($banners, new Campaigns);
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown()
	{
	}

	/**
	 * @covers Tools\DataBuilder::__construct
	 */
	public function testConstruct()
	{
		$banners = new Banners;
		$campaigns = new Campaigns;

		$object = new DataBuilder($banners, $campaigns);

		$msg = 'DataBuilder::__construct() wrong behavior!';
		$this->assertAttributeSame($banners, 'banners', $object, $msg);
		$this->assertAttributeSame($campaigns, 'campaigns', $object, $msg);
	}

	/**
	 * @covers Tools\DataBuilder::build
	 * @covers Tools\DataBuilder::merge
	 *
	 * @param $expected
	 * @dataProvider buildProvider
	 */
	public function testBuild($expected)
	{
		$actual = $this->object->build();
		$msg = 'DataBuilder::build() returns wrong result!';
		$this->assertSame($expected, $actual, $msg);
	}

	public function buildProvider()
	{
		return [
			[
				[
					0 => [
						0  => 4404474,
						1  => 13653389,
						2  => '',
						3  => 1907369,
						4  => 2810,
						5  => 22688.0,
						6  => 'Пенс_КлючиКредит_Рег_240х_МЖ_55+',
						7  => 'FM',
						8  => 55,
						9  => 75,
						10 => 0,
						11 => 'CPC',
					],
					1 => [
						0  => 2707999,
						1  => 10629533,
						2  => 'Title1',
						3  => 2757430,
						4  => 1746,
						5  => 19850.639999999999,
						6  => 'Пенс_РМ30дн_Рег_90х_МЖ_55+',
						7  => 'FM',
						8  => 55,
						9  => 75,
						10 => 0,
						11 => 'CPC',
					],
					2 => [
						0  => 3978008,
						1  => 12963762,
						2  => '',
						3  => 1839146,
						4  => 2096,
						5  => 19049.91,
						6  => 'Ден_КлючиКредит_Рег_240х_МЖ_45-54',
						7  => 'FM',
						8  => 45,
						9  => 54,
						10 => 500,
						11 => 'CPC',
					],
					3 => [
						0  => 3918762,
						1  => 12883281,
						2  => 'Title1',
						3  => 3421253,
						4  => 1345,
						5  => 16915.990000000002,
						6  => 'Пенс_КлючиКредит_Рег_F_55+',
						7  => 'F',
						8  => 55,
						9  => 75,
						10 => 0,
						11 => 'CPC',
					],
					4 => [
						0  => 2707613,
						1  => 10627329,
						2  => 'Кредит под 12%',
						3  => 4649362,
						4  => 1337,
						5  => 15990.219999999999,
						6  => 'Ден_РМ30дн_Рег_90х_Ж_35-44',
						7  => 'F',
						8  => 35,
						9  => 44,
						10 => 0,
						11 => 'CPC',
					],
				]
			]
		];
	}

	///**
	// * @covers Tools\DataBuilder::merge
	// * @todo   Implement testMerge().
	// */
	//public function testMerge()
	//{
	//	// Remove the following lines when you implement this test.
	//	$this->markTestIncomplete(
	//		'This test has not been implemented yet.'
	//	);
	//}
}
