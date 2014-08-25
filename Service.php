<?php
/**
 * @package   ImpressPages
 */


/**
 * Created by PhpStorm.
 * User: mangirdas
 * Date: 14.7.20
 * Time: 12.14
 */

namespace Plugin\Currencies;


class Service
{
    public static function getCurrencyList()
    {
        $currencies = ipDb()->selectColumn('currencies', 'currency', null, ' ORDER BY `priority` desc, `currency` asc');
        return $currencies ;
    }


    public static function getCurrencyRate($currency)
    {
        $rate = ipDb()->selectValue('currencies', 'rate', array('currency' => $currency));
        return $rate;
    }



}
