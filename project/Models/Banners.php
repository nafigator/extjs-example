<?php
/**
 * Модель для получения данных по баннерам из csv-файла
 *
 * @file      Banners.php
 *
 * PHP version 5.4+
 *
 * @author    Yancharuk Alexander <alex at itvault dot info>
 * @copyright © 2012-2016 Alexander Yancharuk <alex at itvault at info>
 * @date      2016-09-15 18:23
 * @license   The BSD 3-Clause License
 *            <https://tldrlegal.com/license/bsd-3-clause-license-(revised)>
 */

namespace Models;

use RuntimeException;

/**
 * Class   Banners
 *
 * @author Yancharuk Alexander <alex at itvault at info>
 */
class Banners
{
	protected $dir;
	protected $path;
	/** @var  string Символ-разделитель полей в csv-файле */
	protected $delimiter = ';';
	protected $name      = 'banners.csv';
	protected $start     = 0;
	protected $limit     = 50;

	/**
	 * Инициализация пути и имени файла
	 */
	public function __construct()
	{
		$this->dir  = realpath(__DIR__ . '/../../data');
		$this->path = "$this->dir/$this->name";
	}

	/**
	 * Чтение csv-файла
	 *
	 * @return array
	 */
	public function read()
	{
		$result = $data = [];
		$start  = $this->start;
		$limit  = $this->limit + 1;

		if (false === ($handle = fopen($this->path, 'r'))) {
			throw new RuntimeException('Не удалось открыть ' . $this->path);
		}

		while (false !== ($row = fgets($handle))) {
			// Пропускаем первую строку CSV-файла, т.к. там названия колонок
			if ($start === 0) {
				++$start;
				continue;
			}

			if (++$start > $limit) {
				break;
			}

			$result[] = explode($this->delimiter, $row);
		}

		fclose($handle);

		return $result;
	}
}
