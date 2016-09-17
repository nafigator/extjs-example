<?php
/**
 * Базовое исключение для всех HTTP-ошибок
 *
 * @file      HttpResponseException.php
 *
 * PHP version 5.4+
 *
 * @author    Yancharuk Alexander <alex at itvault dot info>
 * @copyright © 2012-2016 Alexander Yancharuk <alex at itvault at info>
 * @date      2016-09-17 11:12
 * @license   The BSD 3-Clause License
 *            <https://tldrlegal.com/license/bsd-3-clause-license-(revised)>
 */

namespace Exceptions;

use Exception;

/**
 * Class   HttpResponseException
 *
 * @author Yancharuk Alexander <alex at itvault at info>
 */
class HttpResponseException extends Exception
{
	public function __construct()
	{
		ini_set('display_errors', 0);
		ini_set('log_errors', 0);
		parent::__construct();
	}
}
