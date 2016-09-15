<?php
/**
 * Модель для получения данных по команиям из csv-файла
 *
 * @file      Campaigns.php
 *
 * PHP version 5.4+
 *
 * @author    Yancharuk Alexander <alex at itvault dot info>
 * @copyright © 2012-2016 Alexander Yancharuk <alex at itvault at info>
 * @date      2016-09-15 18:28
 * @license   The BSD 3-Clause License
 *            <https://tldrlegal.com/license/bsd-3-clause-license-(revised)>
 */

namespace Models;

/**
 * Class   Campaigns
 *
 * @author Yancharuk Alexander <alex at itvault at info>
 */
class Campaigns extends Banners
{
	protected $name = 'campaigns.csv';
}
