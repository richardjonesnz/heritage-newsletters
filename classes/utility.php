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

    public static function fetch_years() {
        $years = array();

        for ($y = 2007; $y <= 2020; $y++) {
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

        $sql = "SELECT id, month, year FROM newsletters LIMIT $offset, $limit";

        return $conn->query($sql);
    }
    /**
    * Searches the articles table.
    *
    * @return array of data records.
    */
    public static function fetch_results($conn, $searchtext) {

        $sql = "SELECT * FROM articles WHERE
                title LIKE '$searchtext' OR
                description LIKE '$searchtext'";

        return $conn->query($sql);
    }
   /**
    * Returns a list of articles and publication dates.
    *
    * @return array of data records.
    */
    public static function fetch_results_by_year($conn, $year) {

        $sql = "SELECT n.year, n.month, n.id, a.id, a.newsletterid, a.title, a.description
                FROM newsletters AS n
                JOIN articles AS a
                ON a.newsletterid = n.id
                WHERE n.year = '$year'";

        return $conn->query($sql);
    }
   /**
    * Returns the number of newsletter entries.
    *
    * @return array of data records.
    */
    public static function count_entries($conn) {

        $sql = "SELECT COUNT(*)
                FROM newsletters";

        $n = $conn->query($sql)->fetchColumn();
        return $n;
    }
   /**
    * Returns highest numbered year in table.
    *
    * @return array of data records.
    */
    public static function last_year($conn) {

        $sql = "SELECT MAX(year)
                FROM newsletters";

        return $conn->query($sql);
    }
}