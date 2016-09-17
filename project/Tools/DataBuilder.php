<?php
/**
 * Класс для построения массива данных из баннеров и кампаний
 *
 * @file      DataBuilder.php
 *
 * PHP version 5.4+
 *
 * @author    Yancharuk Alexander <alex at itvault dot info>
 * @copyright © 2012-2016 Alexander Yancharuk <alex at itvault at info>
 * @date      2016-09-17 19:24
 * @license   The BSD 3-Clause License
 *            <https://tldrlegal.com/license/bsd-3-clause-license-(revised)>
 */

namespace Tools;

use Models\Banners;
use Models\Campaigns;

/**
 * Class   DataBuilder
 *
 * @author Yancharuk Alexander <alex at itvault at info>
 */
class DataBuilder
{
	/** @var  Banners */
	protected $banners;
	/** @var  Campaigns */
	protected $campaigns;
	protected $campaigns_data;
	protected $campaigns_ids;
	/** @var  int Общий ключ в массивах баннеров и кампаний */
	protected $intersect_key = 0;
	protected $empty_campaign = ['', '', 0, 0, 0, ''];

	/**
	 * Передаём модели баннеров и кампаний
	 *
	 * @param Banners   $banners
	 * @param Campaigns $campaigns
	 */
	public function __construct(Banners $banners, Campaigns $campaigns)
	{
		$this->banners   = $banners;
		$this->campaigns = $campaigns;
	}

	/**
	 * Строим массив с общими данными баннеров и кампаний
	 */
	public function build()
	{
		$banners_data         = $this->banners->read();
		$this->campaigns_data = $this->campaigns->read();
		$this->campaigns_ids  = array_column($this->campaigns_data, 0);

		$data = array_map([$this, 'merge'], $banners_data);
		unset(
			$banners_data,
			$this->campaigns_data,
			$this->campaigns_ids
		);

		return $data;
	}

	/**
	 * Ищем в массиве кампаний кампанию с id из массива баннера и объединяем
	 *
	 * @param array $banner
	 *
	 * @return array
	 */
	public function merge(array $banner)
	{
		$key = array_search($banner[0], $this->campaigns_ids);

		return false !== $key
			// Обрезаем из массива компаний id, т.к. он уже есть в баннерах
			? array_merge($banner, array_slice($this->campaigns_data[$key], 1))
			: array_merge($banner, $this->empty_campaign);
	}
}
