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

use Models\Banners;

/**
 * Class   Load
 *
 * @author Yancharuk Alexander <alex at itvault at info>
 */
class Load extends BaseController
{
	/**
	 * Экшен главной страницы
	 *
	 * @return array
	 */
	public function get()
	{
		$banners = (new Banners)->read();

		return $banners;
	}
}
