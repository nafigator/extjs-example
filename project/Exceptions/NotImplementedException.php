<?php
/**
 * @file      NotImplementedException.php
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

/**
 * Class   NotImplementedException
 *
 * @author Yancharuk Alexander <alex at itvault at info>
 */
class NotImplementedException extends HttpResponseException
{
	public function __construct()
	{
		parent::__construct();
		header('HTTP/1.1 501 Not Implemented', true, 501);
	}
}
