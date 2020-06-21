<?php
/**
 * Display one newsletter
 *
 * @package heritage_newsletters
 * @copyright 2020 Richard Jones https://richardnz.net
 * @license Creative Commons CC-BY 3.0 NZ
 */
require_once('/var/www/news/mustache_inc.php');
require_once('/var/www/news/open_db_inc.php');
include('classes/utility.php');
$template = $M->loadTemplate('articles.mustache');

$data = new stdClass;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['searchtext'])) {
        $text = test_input($_POST['searchtext']);
        $data->searchedfor = 'Showing records matching: ' . $text;
    } else {
        $data->searchedfor = 'Showing all records';
    }
}
$searchtext = '%' . $text . '%';
// Query the articles data table.
$data->records = utility::fetch_results($conn, $searchtext);
$data->pagetitle = 'Search Newsletter Articles';
$data->heading = 'Articles search page';

echo $template->render($data);


/**
 * Process the raw form input.
 *
 * @see https://www.w3schools.com/php7/php7_form_validation.asp
 */
function test_input($item) {
  $item = trim($item);
  $item = stripslashes($item);
  $item = htmlspecialchars($item);
  return $item;
}