<?php
/**
 * Utility class
 *
 * @package heritage-newsletters
 * @copyright 2020 Richard Jones https://richardnz.net
 * @license Creative Commons CC-BY 3.0 NZ
 */
class utility {
    /**
    * defines months
    *
    * @return months array
    */
    public static function fetch_months() {
        return ['January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'];
    }
    /**
    * defines years.
    *
    * @return years array
    */

    public static function fetch_years($conn) {

        $sql = "SELECT MAX(year)
                FROM newsletters";
        $last =  $conn->query($sql)->fetchColumn();
        $years = array();

        for ($y = 2007; $y <= $last; $y++) {
            $years[] = (string) $y;
        }

        return $years;
    }

    /**
    * Returns the contents of the newsletters table.
    *
    * @return array of data records.
    */
    public static function fetch_newsletters($conn, $offset, $limit) {

        $sql = "SELECT id, month, year, duplicate FROM newsletters LIMIT $offset, $limit";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $records = $stmt->fetchAll();

        foreach($records as &$record) {
            if ($record['duplicate'] == 0) {
                $record['duplicate'] = '';
            }
            unset($record);
        }

        return $records;
  }
    /**
    * Searches the articles table.
    *
    * @return array of data records.
    */
    public static function fetch_results($conn, $searchtext) {

        $sql = "SELECT * FROM articles WHERE
                title LIKE '$searchtext' OR
                description LIKE '$searchtext'
                ORDER BY title";

        return $conn->query($sql);
    }
   /**
    * Returns a list of articles and publication dates.
    *
    * @return array of data records.
    */
    public static function fetch_results_by_year($conn, $year, $month) {

        $sql = "SELECT n.year, n.month, n.id, a.id, a.newsletterid, a.title, a.description
                FROM newsletters AS n
                JOIN articles AS a
                ON a.newsletterid = n.id
                WHERE n.year = '$year' and n.month = '$month'";

        return $conn->query($sql);
    }
   /**
    * Returns the number of newsletter entries.
    *
    * @return int.
    */
    public static function count_entries($conn) {

        $sql = "SELECT COUNT(*)
                FROM newsletters";

        return $conn->query($sql)->fetchColumn();
    }
    /**
    * Returns the newsletter id matching year and month.
    *
    * @return int.
    */
    public static function get_newsletterid($conn, $year, $month) {

        $sql = "SELECT id
                FROM newsletters
                WHERE year = '$year' and month = '$month'
                LIMIT 1";

        return $conn->query($sql)->fetchColumn();
    }

    function check_loggedin() {
        // Check for loggedin session variable
        return (isset($_SESSION['loggedin']));
    }

}