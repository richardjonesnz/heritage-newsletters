<?php
/**
 * Newsletters home page.
 *
 * @package heritage_newsletters
 * @copyright 2019 Richard Jones https://richardnz.net
 * @license Creative Commons CC-BY 3.0 NZ
 */
require_once('/var/www/news/config_inc.php');
$template = $M->loadTemplate('welcome.mustache');
$data = new stdClass;
$data->pagetitle = 'Home page';
$data->heading = 'Newsletters home page';
$data->greeting = 'Welcome ';
$data->name = (isset($_SESSION['firstname'])) ? $_SESSION['firstname'] : '';
$data->body = 'This site allows you find and search through our newsletters.';
$data->navcardtitle = 'Navigation';
$data->navcardbody = 'On other pages:';
$data->copyright = 'Richard 2019';
echo $template->render($data);
?>