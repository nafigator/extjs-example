<?php
/**
 * Класс реализующий MVC-функционал
 *
 * @file      ArticsApplication.php
 *
 * PHP version 5.4+
 *
 * @author    Yancharuk Alexander <alex at itvault dot info>
 * @copyright © 2012-2016 Alexander Yancharuk <alex at itvault at info>
 * @date      2016-09-19 09:58
 * @license   The BSD 3-Clause License
 *            <https://tldrlegal.com/license/bsd-3-clause-license-(revised)>
 */

namespace Application;

use Veles\Application\Application;
use Veles\View\View;

/**
 * Class   ArticsApplication
 *
 * @author Yancharuk Alexander <alex at itvault at info>
 */
class ArticsApplication extends Application
{
	/**
	 * Application start
	 */
	public function run()
	{
		$controller  = $this->getRoute()->getController();
		$action_name = $this->getRoute()->getActionName();
		$template    = $this->getRoute()->getTemplate();

		View::setAdapter($this->getRoute()->getAdapter());
		View::set($controller->$action_name());

		View::show($template);
	}
}
