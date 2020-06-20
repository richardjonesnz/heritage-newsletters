<?php
/**
 * Newsletters home page.
 *
 * @package heritage_newsletters
 * @copyright 2020 Richard Jones https://richardnz.net
 * @license Creative Commons CC-BY 3.0 NZ
 */
require_once('/var/www/news/config_inc.php');
include('classes/utility.php');

$template = $M->loadTemplate('welcome.mustache');
$data = new stdClass;
$data->pagetitle = 'Home page';
$data->heading = 'Newsletters home page';
$data->greeting = 'Welcome ';
$data->name = (isset($_SESSION['firstname'])) ? $_SESSION['firstname'] : 'user';
$data->general = 'This page allows you browse through our newsletters. Click a link to view the pdf version of the newsletter.  Use the back button to return.  You may also print or download the newsletter.';
$data->search = 'Click the link to search for specific articles: ';
$data->copyright = '2020 Richard F Jones for Pirongia Heritage Centre';
$data->website = 'https://richardnz.net';

$data->records = utility::fetch_newsletters($conn);

echo $template->render($data);

?>