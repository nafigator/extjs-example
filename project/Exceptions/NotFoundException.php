<?php
/**
 * Исключение для 404 ошибки
 *
 * @file      NotFoundException.php
 *
 * PHP version 5.4+
 *
 * @author    Yancharuk Alexander <alex at itvault dot info>
 * @copyright © 2012-2016 Alexander Yancharuk <alex at itvault at info>
 * @date      2016-09-15 17:00
 * @license   The BSD 3-Clause License
 *            <https://tldrlegal.com/license/bsd-3-clause-license-(revised)>
 */

namespace Exceptions;

use Veles\View\View;

/**
 * Class   NotFoundException
 *
 * @author Yancharuk Alexander <alex at itvault at info>
 */
class NotFoundException extends HttpResponseException
{
	protected $uri;
	protected $user_agent;
	protected $remote_ip;

	public function __construct()
	{
		parent::__construct();

		$this->uri        = $_SERVER['REQUEST_URI'];
		$this->user_agent = isset($_SERVER['HTTP_USER_AGENT'])
			? $_SERVER['HTTP_USER_AGENT']
			: 'WARNING! HTTP_USER_AGENT NOT DEFINED!';

		$this->remote_ip  = isset($_SERVER['REMOTE_ADDR'])
			? $_SERVER['REMOTE_ADDR']
			: (isset($_SERVER['HTTP_X_FORWARDED_FOR'])
				? $_SERVER['HTTP_X_FORWARDED_FOR']
				: $_SERVER['HTTP_CLIENT_IP']);

		header('HTTP/1.1 404 Not Found', true, 404);
		View::set(['uri' => $_SERVER['REQUEST_URI']]);
		View::show('errors/404.phtml');
	}
}
