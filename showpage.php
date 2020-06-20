<?php
/**
 * Display one newsletter
 *
 * @package heritage_newsletters
 * @copyright 2020 Richard Jones https://richardnz.net
 * @license Creative Commons CC-BY 3.0 NZ
 */
require_once('/var/www/news/mustache_inc.php');

// Get the Newsletter id (not sensitive data).
$number = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
echo 'this is ' . $number;
$template = $M->loadTemplate('showpage.mustache');
$data = new stdClass;
$data->number = $number;
$data->pagetitle = 'Viewing Newsletter';
$data->heading = 'Newsletters home page';
$data->greeting = 'View newsletter: ';
$data->general = 'To return to the home page click here: ';
$data->copyright = '2020 Richard F Jones for Pirongia Heritage Centre';
$data->website = 'https://richardnz.net';

echo $template->render($data);
