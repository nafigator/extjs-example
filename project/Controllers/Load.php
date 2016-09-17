<?php
/**
 * Контроллер для AJAX-запроса баннеров
 *
 * @file      Load.php
 *
 * PHP version 5.4+
 *
 * @author    Yancharuk Alexander <alex at itvault dot info>
 * @copyright © 2012-2016 Alexander Yancharuk <alex at itvault at info>
 * @date      2016-09-17 10:10
 * @license   The BSD 3-Clause License
 *            <https://tldrlegal.com/license/bsd-3-clause-license-(revised)>
 */

namespace Controllers;

use Exceptions\RuntimeException;
use Models\Banners;

/**
 * Class   Load
 *
 * @author Yancharuk Alexander <alex at itvault at info>
 */
class Load extends BaseController
{
	protected $get_definitions = [
		'start' => [
			'filter' => FILTER_VALIDATE_INT,
			'options' => [
				'min_range' => 0,
				'max_range' => PHP_INT_MAX
			]
		],
		'limit' => [
			'filter' => FILTER_VALIDATE_INT,
			'options' => [
				'min_range' => 1,
				'max_range' => PHP_INT_MAX
			]
		],
	];

	/**
	 * Экшен главной страницы
	 *
	 * @return array
	 */
	public function get()
	{
		$start = $limit = null;
		extract($this->getParams(), EXTR_IF_EXISTS);

		$banners = (new Banners)
			->setStart($start)
			->setOffset($limit)
			->read();

		$result = [
			'success' => true,
    		'total'   => 2000,
			'items'   => $banners
		];

		return $result;
	}

	/**
	 * Валидируем пользовательский ввод из GET-массива
	 *
	 * @return array
	 * @throws RuntimeException
	 */
	protected function getParams()
	{
		$get = filter_input_array(INPUT_GET, $this->get_definitions);

		if (false === $get['start'] || false === $get['limit']) {
			throw new RuntimeException('Передан невалидный параметр');
		}

		return $get;
	}
}
