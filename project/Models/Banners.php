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

use Exceptions\RuntimeException;

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
	protected $offset    = 25;
	/** @var array Функции применяемые к значениям, взятым из csv */
	protected $types = [
		0 => 'int',
		1 => 'int',
		2 => 'string',
		3 => 'int',
		4 => 'int',
		5 => 'float'
	];

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
	 * @throws RuntimeException
	 */
	public function read()
	{
		$result  = $data = [];
		$start   = $this->start + 1;
		$end     = $start + $this->offset;
		$current = 0;

		if (false === ($handle = fopen($this->path, 'r'))) {
			throw new RuntimeException('Не удалось открыть ' . $this->path);
		}

		while (false !== ($row = fgets($handle))) {
			// Пропускаем первую строку CSV-файла, и строки идущие ранее $start
			if ($current === 0 || $current < $start) {
				++$current;
				continue;
			}

			if (++$current > $end) {
				break;
			}

			$values = str_getcsv($row, $this->delimiter);

			$result[] = array_map(
				[$this, 'fixTypes'], array_keys($values), $values
			);
		}

		fclose($handle);

		return $result;
	}

	/**
	 * @param int $start
	 *
	 * @return Banners
	 */
	public function setStart($start)
	{
		if (null !== $start) {
			$this->start = $start;
		}

		return $this;
	}

	/**
	 * @param int $offset
	 *
	 * @return Banners
	 */
	public function setOffset($offset)
	{
		if (null !== $offset) {
			$this->offset = $offset;
		}

		return $this;
	}

	/**
	 * Приводим к корректным типам значения
	 *
	 * @param int $key
	 * @param string $value
	 *
	 * @return mixed
	 */
	public function fixTypes($key, $value)
	{
		if ('float' === $this->types[$key]) {
			$value = str_replace(',', '.', $value);
		}

		settype($value, $this->types[$key]);

		return $value;
	}
}
