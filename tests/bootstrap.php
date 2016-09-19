<?php
/**
 * Bootstrap для юнит-тестов
 *
 * @file      bootstrap.php
 *
 * PHP version 5.4+
 *
 * @author    Yancharuk Alexander <alex at itvault dot info>
 * @copyright © 2012-2016 Alexander Yancharuk <alex at itvault at info>
 * @date      2016-09-18 18:47
 * @license   The BSD 3-Clause License
 *            <https://tldrlegal.com/license/bsd-3-clause-license-(revised)>
 */

use Veles\AutoLoader;
use Veles\View\Adapters\NativeAdapter;
use Veles\View\View;

ini_set('display_errors', 1);
ini_set('error_reporting', -1);
ini_set('log_errors', 1);
ini_set('html_errors', 0);
ini_set('xdebug.cli_color', 1);
ini_set('xdebug.var_display_max_children', -1);
ini_set('xdebug.var_display_max_data', -1);
ini_set('xdebug.var_display_max_depth', -1);
ini_set('xdebug.collect_params', 3);
ini_set('xdebug.scream', 1);

$path = realpath(__DIR__ . '/..');

setlocale(LC_ALL, 'ru_RU.utf8');
date_default_timezone_set('Europe/Moscow');

require "$path/lib/Veles/AutoLoader.php";
set_include_path(
	implode(PATH_SEPARATOR, ["$path/lib:$path/project", get_include_path()])
);
AutoLoader::init();

$view_adapter = new NativeAdapter;
$view_adapter->setTemplateDir("$path/project/Templates/");
View::setAdapter($view_adapter);
