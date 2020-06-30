<?php
/**
 * Display newsletter articles by year
 *
 * @package heritage_newsletters
 * @copyright 2020 Richard Jones https://richardnz.net
 * @license Creative Commons CC-BY 3.0 NZ
 */
require_once('/var/www/news/mustache_inc.php');
require_once('/var/www/news/open_db_inc.php');
include('classes/utility.php');

$template = $M->loadTemplate('by_year.mustache');
$data = new stdClass;
$year = 2012;
$data->year = $year;
$data->pagetitle = 'Articles for ' . $year;
$data->heading = 'Browse newsletters by year';
$data->records = utility::fetch_results_by_year($conn, $year);

echo $template->render($data);