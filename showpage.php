<?php
/**
 * Display one newsletter
 *
 * @package heritage_newsletters
 * @copyright 2020 Richard Jones https://richardnz.net
 * @license Creative Commons CC-BY 3.0 NZ
 */
require_once('/var/www/news/mustache_inc.php');

// Get the Newsletter id.
$number = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ( ($number < 1) || ($number > 45) ) { $number = 1; }
$template = $M->loadTemplate('showpage.mustache');
$data = new stdClass;
$data->number = $number;
$data->pagetitle = 'Viewing Newsletter';
$data->heading = 'Newsletters home page';

echo $template->render($data);