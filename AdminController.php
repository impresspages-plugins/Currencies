<?php
/**
 * @package   ImpressPages
 */


/**
 * Created by PhpStorm.
 * User: mangirdas
 * Date: 6/24/14
 * Time: 4:25 PM
 */

namespace Plugin\Currencies;


class AdminController
{


    public function index()
    {
        $config = array(
            'title' => __('Currencies', 'Currencies', false),
            'table' => 'currencies',
            'sortField' => 'priority',
            'createPosition' => 'bottom',
            'fields' => array(
                array(
                    'label' => __('Currency', 'Currencies', false),
                    'field' => 'currency',
                    'transformations' => array('Trim', 'UpperCase'),
                    'validators' => array(
                        'Required',
                        array('Regex', '/^[A-Z][A-Z][A-Z]$/', __('Please use three uppercase letter abbreviation. Eg. USD', 'Currencies', false))
                    )
                ),
                array(
                    'label' => __('Rate', 'Currencies', false),
                    'field' => 'rate',
                    'transformations' => array('Trim'),
                    'validators' => array(
                        'Required',
                        array('Regex', '/^[0-9]+(\.[0-9]+)?$/', __('Incorrect value. Eg. value 1.123', 'Currencies', false)),
                        array('NotInArray', array('0'))
                    ),
                    'note' => __('Rate when converting from / to this currency. Calculations are done using the equation: currency1amount / ratio1 = currency2amount / ratio2. We suggest to set your main currency ratio to 1 to ease the calculations. Let say USD is set to 1. Then setting EUR = 0.76 means that 1 USD is equal to 0.76 EUR', 'Currencies', false)
                )

            )
        );
        $config = ipFilter('Currencies_countriesGridConfig', $config);

        $answer = '';
        if (ipRequest()->getRequest('method') == '') {
            $answer .= ipGridController($config);
        } else {
            $answer = ipGridController($config);
        }

        return $answer;
    }


}
