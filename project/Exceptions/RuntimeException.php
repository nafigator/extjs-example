<?php
/**
 * @file      RuntimeException.php
 *
 * PHP version 5.4+
 *
 * @author    Yancharuk Alexander <alex at itvault dot info>
 * @copyright © 2012-2016 Alexander Yancharuk <alex at itvault at info>
 * @date      2016-09-17 16:07
 * @license   The BSD 3-Clause License
 *            <https://tldrlegal.com/license/bsd-3-clause-license-(revised)>
 */

namespace Exceptions;

/**
 * Class   RuntimeException
 *
 * @author Yancharuk Alexander <alex at itvault at info>
 */
class RuntimeException extends HttpResponseException
{
	public function __construct($msg)
	{
		parent::__construct();
		$this->message = $msg;

		header('HTTP/1.1 500 Internal Server Error', true, 500);
	}
}
