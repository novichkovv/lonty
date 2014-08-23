<?php
/**
 * Created by PhpStorm.
 * User: krav4uk
 * Date: 23.08.14
 * Time: 21:30
 */

class features
{
    function translateMonth($month, $case = 'nominative')
    {

        switch($case)
        {
            case 'nominative':
                $months = array(
                    1 => 'январь',
                    2 => 'февраль',
                    3 => 'март',
                    4 => 'аперль',
                    5 => 'май',
                    6 => 'июнь',
                    7 => 'июль',
                    8 => 'август',
                    9 => 'сентябрь',
                    10 => 'октябрь',
                    11 => 'ноябрь',
                    12 => 'декабрь',
                );
            break;
            case 'genitive':
                $months = array(
                    1 => 'января',
                    2 => 'февраля',
                    3 => 'марта',
                    4 => 'аперля',
                    5 => 'мая',
                    6 => 'июня',
                    7 => 'июля',
                    8 => 'августа',
                    9 => 'сентября',
                    10 => 'октября',
                    11 => 'ноября',
                    12 => 'декабря',
                );
            break;
        }
        return $months[$month];
    }
}