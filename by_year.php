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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['year'])) {
        $data->year = $_POST['year'];
    } else {
        $data->year = "2007";
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['month'])) {
        $data->month = $_POST['month'];
    } else {
        $data->month = "Feb";
    }
}
$data->years = utility::fetch_years($conn);
$data->months = utility::fetch_months();
$data->pagetitle = 'Articles for ' . $year;
$data->heading = 'Browse articles by year';
$data->yeardata[] = new stdClass;

foreach($data->years as $y) {

    $data->yeardata[]->year =$y;

    if ($data->year == $y) {
        $data->yeardata->selected = 'selected';
     } else {
        $data->yeardata->selected = '';
     }
}

$data->monthdata[] = new stdClass;

foreach($data->months as $m) {

    $data->monthdata[]->month =$m;

    if ($data->month == $m) {
        $data->monthdata->selected = 'selected';
     } else {
        $data->monthdata->selected = '';
     }
}


$data->records = utility::fetch_results_by_year($conn, $data->year, $data->month);
$data->newsletterid = (int) utility::get_newsletterid($conn, $data->year, $data->month);

echo $template->render($data);