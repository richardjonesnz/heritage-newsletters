<?php
/**
 * Display one newsletter
 *
 * @package heritage_newsletters
 * @copyright 2020 Richard Jones https://richardnz.net
 * @license Creative Commons CC-BY 3.0 NZ
 */
require_once('/var/www/jonesnz/data/news/mustache_inc.php');
require_once('/var/www/jonesnz/data/news/open_db_inc.php');
include('classes/utility.php');

// Get the Newsletter id.
$number = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$max = utility::count_entries($conn);

if ( ($number < 1) || ($number > $max) ) { $number = 1; }
$template = $M->loadTemplate('showpage.mustache');
$data = new stdClass;
$data->number = $number;
$data->pagetitle = 'Viewing Newsletter';
$data->heading = 'Newsletters home page';
$data->next = $number + 1;
$data->previous = $number - 1;

echo $template->render($data);