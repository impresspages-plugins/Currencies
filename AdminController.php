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
            'table' => 'Currencies',
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
                    'note' => __('Rate when converting from / to this currency. Calculations are done this way: currency1amount * ratio1 = currency2amount * ratio2. We suggest to set your main currency ratio to 1 to ease the calculations.', 'Currencies', false)
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
