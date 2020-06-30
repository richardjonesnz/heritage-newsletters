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

// Total records.
$numrecords = utility::count_entries($conn);
echo ''. $numrecords;
$data = new stdClass;
$data->pagetitle = 'Home page';
$data->heading = 'Newsletters home page';
$data->greeting = 'Welcome ';
$data->name = (isset($_SESSION['firstname'])) ? $_SESSION['firstname'] : 'user';
$data->page = (isset($_GET['page']) && is_numeric($_GET['page']) ) ? $_GET['page'] : 1;
$data->limit = 10;
$num_pages = ceil($numrecords / $data->limit);

// Create an array of data for the page links.
$data->pagelinks = array();
for ($i = 1; $i <= $num_pages; $i++) {
    $data->page_links[] = ' ' . $i;
}

// Get records for current page.
$offset = ($data->page - 1) * $data->limit;
$data->records = utility::fetch_newsletters($conn, $offset, $data->limit);

echo $template->render($data);

?>