<?php
/**
 * Newsletters home page.
 *
 * @package heritage_newsletters
 * @copyright 2020 Richard Jones https://richardnz.net
 * @license Creative Commons CC-BY 3.0 NZ
 */
require_once('/var/www/news/config_inc.php');
require_once('/var/www/news/mustache_inc.php');
include('classes/utility.php');

$template = $M->loadTemplate('welcome.mustache');
$data = new stdClass;
$data->pagetitle = 'Home page';
$data->heading = 'Newsletters home page';
$data->greeting = 'Welcome ';
$data->name = (isset($_SESSION['firstname'])) ? $_SESSION['firstname'] : 'user';

$data->records = utility::fetch_newsletters($conn);

echo $template->render($data);

?>