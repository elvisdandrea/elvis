<?php

/**
 * Class String
 *
 * A library to manipulate and convert string values
 *
 * Author: Elvis D'Andrea
 * E-mail: elvis@vistasoft.com.br
 *
 */

class String {

    /**
     * Preventing string from having string injections
     *
     * @param   string      $string     - The original string
     * @return  string                  - The escaped string
     */
    public static function ClearString( $string ) {

        #$string = mysql_real_escape_string($string);
        $string = addslashes($string);
        return $string;
    }


    /**
     * Cleans an entire array recursively
     * from having string injection
     *
     * @param   array       $array      - The original array
     * @return  array                   - The escaped array
     */
    public static function ClearArray( $array ) {
        foreach ( $array as $key => $value ) {
            if ( is_array( $value ) ) {
                $array[$key] = self::ClearArray( $value );
            } else {
                $array[$value] = self::ClearString( $value );
            }
        }
        return $array;
    }

    /**
     * Remove new line characters from a string
     *
     * @param   string      $string     - The original string
     * @return  string                  - The string without new lines
     */
    public static function RemoveNewLines( $string ) {
        return preg_replace( '/\s+/', ' ', trim( $string ) );
    }

    /**
     * An "addslashes" for single quotes only
     *
     * @param   string      $string     - The original string
     * @return  string
     */
    public static function AddSQSlashes( $string ) {
        return str_replace( '\'', '\\\'', $string );
    }

    /**
     * A non-validation version to format string dates
     * from dd/mm/yyyy to yyyy-mm-dd
     *
     * The purpose is to do it fast, so it's not secure
     * if the incoming string isn't correct
     *
     * @param   string      $date       - The original string date in dd/mm/yyyy format
     * @return  string                  - The string formatted to yyyy-mm-dd
     */
    public static function formatDateToSave($date) {
        if (strpos($date, '/') !== false) {
            $date = explode('/', $date);
            return $date[2] . '-' . $date[1] . '-' . $date[0];
        }
        return '0000-00-00';
    }

    /**
     * A non-validation version to format string dates
     * from dd/mm/yyyy hh:mm:ss to yyyy-mm-dd hh:mm:ss
     *
     * The purpose is to do it fast, so it's not secure
     * if the incoming string isn't correct
     *
     * @param   string      $date       - The original string date in dd/mm/yyyy format
     * @param   string      $time       - The original time in hh:mm:ss
     * @return  string                  - The string formatted to yyyy-mm-dd hh:mm:ss
     */
    public static function formatDateTimeToSave($date, $time) {
        $date = self::formatDateToSave($date);
        if (strpos($time, ':') === false) $time = '00:00:00';
        return $date . ' ' . $time;
    }

    /**
     * A non-validation version to format string dates
     * from yyyy-mm-dd to dd/mm/yyyy
     *
     * The purpose is to do it fast, so it's not secure
     * if the incoming string isn't correct
     *
     * @param   string      $date       - The original string date in yyyy-mm-dd format
     * @return  string                  - The string formatted to dd/mm/yyyy
     */
    public static function formatDateToLoad($date) {
        if (strpos($date, '-') !== false) {
            $date = explode('-', $date);
            return $date[2] . '/' . $date[1] . '/' . $date[0];
        }
        return '00/00/0000';
    }

    /**
     * A non-validation version to format string dates
     * from yyyy-mm-dd hh:mm:ss to dd/mm/yyyy hh:mm:ss
     *
     * The purpose is to do it fast, so it's not secure
     * if the incoming string isn't correct
     *
     * @param   string      $datetime       - The original string date in yyyy-mm-ddd hh:mm:ss format
     * @param   string      $separator      - Character to separate the date from time (optional)
     * @return  string                      - The string formatted to dd/mm/yyyy hh:mm:ss
     */
    public static function formatDateTimeToLoad($datetime, $separator = '') {
        $date = explode(' ',$datetime);
        if (count($date) > 1) {
            $fdate = self::formatDateToLoad($date[0]);
            $ftime = explode(':', $date[1]);
            $ftime = $ftime[0] . ':' . $ftime[1];
            return $fdate . ' ' . $separator. ' ' . $ftime;
        }
        return '00/00/0000 '.$separator.' 00:00';
    }

    /**
     * Removes empty values for arrays
     * with numeric indexes
     *
     * The indexes that contain values will
     * be moved upwards, so numeric indexes
     * will remain in sequence
     *
     * @param   array       $array      - The original array
     */
    public static function arrayTrimNumericIndexed(&$array) {

        $result = array();

        foreach ($array as $value) $value == '' || $result[] = $value;
        $array = $result;
    }

}

?>
