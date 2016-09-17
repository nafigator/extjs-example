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

use Exceptions\RuntimeException;

/**
 * Class   Campaigns
 *
 * @author Yancharuk Alexander <alex at itvault at info>
 */
class Campaigns extends Banners
{
	protected $name = 'campaigns.csv';
	/** @var array Функции применяемые к значениям, взятым из csv */
	protected $types = ['int', 'string', 'string', 'int', 'int', 'int', 'string'];

	/**
	 * Читаем полностью файл с кампаниями
	 *
	 * @return array
	 * @throws RuntimeException
	 */
	public function read()
	{
		$result = [];

		if (false === ($handle = fopen($this->path, 'r'))) {
			throw new RuntimeException('Не удалось открыть ' . $this->path);
		}

		$current = 0;

		while (false !== ($values = fgetcsv($handle, 4096, $this->delimiter))) {
			// Пропускаем первую строку CSV-файла
			if ($current === 0) {
				++$current;
				continue;
			}

			$result[] = array_map(
				[$this, 'fixTypes'], array_keys($values), $values
			);
		}

		fclose($handle);

		return $result;
	}
}
