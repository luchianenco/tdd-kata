<?php
/**
 * @author Serghei Luchianenco (s@luchianenco.com)
 * Date: 27/03/2017
 * Time: 14:08
 */

namespace App;

class Calculator
{
    const MAX_NUMBERS = 2;

    /**
     * Add String Numbers
     * @param $string
     * @return int|string
     * @throws \InvalidArgumentException
     */
    public function add($string)
    {
        if ($string === '') {
            return '';
        }

        $values = $this->convertStringToValues($string);


        if ($result = $this->twoValues($values)) {
            return $result;
        }

        if ($result = $this->oneValue($values)) {
            return $result;
        }

        throw new \InvalidArgumentException('More than 2 numbers in string not allowed');
    }

    public function twoValues(array $values) : int
    {
        if (count($values) !== 2) {
            return false;
        }

        $sum = 0;
        foreach ($values as $value) {
            $sum += $value;
        }

        return $sum;
    }

    public function oneValue($values) : int
    {
        if (count($values) !== 1) {
            return false;
        }

        return 2 * $values[0];
    }

    /**
     * Convert String to Values
     * @param string $string
     * @return array
     */
    private function convertStringToValues($string) : array
    {
        return explode(',', $string);
    }
}