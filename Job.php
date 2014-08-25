<?php
/**
 * @package   ImpressPages
 */


/**
 * Created by PhpStorm.
 * User: mangirdas
 * Date: 8/11/14
 * Time: 8:21 AM
 */

namespace Plugin\Currencies;


class Job
{
    public static function ipConvertCurrency($data)
    {
        $amount = $data['amount'];
        $sourceCurrency = $data['sourceCurrency'];
        $destinationCurrency = $data['destinationCurrency'];
        $sourceRate = Service::getCurrencyRate($sourceCurrency);
        $destinationRate = Service::getCurrencyRate($destinationCurrency);
        if ($sourceRate !== null && $destinationRate !== null) {
            $newAmount = $amount / $sourceRate * $destinationRate;
            return $newAmount;
        }

//        a1 / r1 = a2 / r2
//            a2 = a1 / r1 * r2
    }
}
