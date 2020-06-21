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
    * defines years since 2007 and up to 2016.
    *
    * @return years array
    */

    public static function fetch_years() {
        $years = array();

        for ($y = 2007; $y <= 2016; $y++) {
            $years[] = (string) $y;
        }

        return $years;
    }

    /**
    * Returns the contents of the newsletters table.
    *
    * @return array of data records.
    */
    public static function fetch_newsletters($conn) {

        $s = $conn->prepare("SELECT id, month, year FROM newsletters");
        $s->execute();

        return $s->fetchAll();
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

}