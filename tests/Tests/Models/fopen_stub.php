<?php
/**
 * Это заглушка для функции fopen() при тестировании
 *
 * @file      fopen_stub.php
 *
 * PHP version 5.4+
 *
 * @author    Yancharuk Alexander <ya@zerotech.ru>
 * @date      2016-09-20 14:00
 * @copyright 2015-2016 ZeroTech LLC
 */

namespace Models;

function fopen($path, $mode)
{
	if (!preg_match('/.*\/(\w+\.csv)/', $path, $matches)) {
		throw new \RuntimeException('File name parsing failure in fopen() stub!');
	}

	$path = realpath(__DIR__ . "/$matches[1]");
	$handle = \fopen($path, $mode);

	return $handle;
}
