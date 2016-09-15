<?php
/**
 * Created by IntelliJ IDEA.
 * User: Dell
 * Date: 8/28/2016
 * Time: 11:31 PM
 */

namespace App\Helpers;

use DateTime;

class FormatHelper
{

    const SPLIT_BOTH = 0;
    const SPLIT_DATE = 1;
    const SPLIT_TIME = 2;

    public function makeDate()
    {
        return date('Y-m-d H:i:s');
    }

    public static function splitDateTime($dateTime, $constant = self::SPLIT_BOTH)
    {
        $result = explode(' ', $dateTime);

        switch ($constant) {
            case self::SPLIT_TIME:
                return new DateTime($result[1]);
                break;
            case self::SPLIT_DATE:
                return new DateTime($result[0]);
                break;
            default:
                return array(
                    'date'  =>  new DateTime($result[0]),
                    'time'  =>  new DateTime($result[1])
                );
                break;
        }
    }

    public static function employeeNumberFormatter($date)
    {

    }
}