<?php
/**
 * Базовый класс для контроллеров
 *
 * @file      BaseController.php
 *
 * PHP version 5.4+
 *
 * @author    Yancharuk Alexander <alex at itvault dot info>
 * @copyright © 2012-2016 Alexander Yancharuk <alex at itvault at info>
 * @date      2016-09-17 11:10
 * @license   The BSD 3-Clause License
 *            <https://tldrlegal.com/license/bsd-3-clause-license-(revised)>
 */

namespace Controllers;

use Exceptions\NotImplementedException;

/**
 * Class   BaseController
 *
 * @author Yancharuk Alexander <alex at itvault at info>
 */
class BaseController
{
	/**
	 * В зависимости от типа запроса вызываем соответствующий метод
	 *
	 * @return array
	 * @throws NotImplementedException
	 */
	public function index()
	{
		switch ($_SERVER['REQUEST_METHOD']) {
			case 'POST':
				$result = $this->post();
				break;
			case 'GET':
				$result = $this->get();
				break;
			case 'PUT':
				$result = $this->put();
				break;
			case 'DELETE':
				$result = $this->delete();
				break;
			default:
				throw new NotImplementedException;
				break;
		};

		return $result;
	}

	/**
	 * Метод реализует функционал HTTP POST запроса
	 *
	 * @return array
	 * @throws NotImplementedException
	 */
	public function post()
	{
		throw new NotImplementedException;
	}

	/**
	 * Метод реализует функционал HTTP GET запроса
	 *
	 * @return array
	 * @throws NotImplementedException
	 */
	public function get()
	{
		throw new NotImplementedException;
	}

	/**
	 * Метод реализует функционал HTTP PUT запроса
	 *
	 * @return array
	 * @throws NotImplementedException
	 */
	public function put()
	{
		throw new NotImplementedException;
	}

	/**
	 * Метод реализует функционал HTTP DELETE запроса
	 *
	 * @return array
	 * @throws NotImplementedException
	 */
	public function delete()
	{
		throw new NotImplementedException;
	}
}
