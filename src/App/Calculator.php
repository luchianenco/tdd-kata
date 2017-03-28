<?php
/**
 * @author Serghei Luchianenco (s@luchianenco.com)
 * Date: 27/03/2017
 * Time: 14:08
 */

namespace App;

class Calculator
{
    const DELIMITER = ',';

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


        if ($result = $this->manyValues($values)) {
            return $result;
        }

        if ($result = $this->oneValue($values)) {
            return $result;
        }
    }

    /**
     * @param array $values
     * @return int
     */
    public function manyValues(array $values) : int
    {
        if (count($values) < 2) {
            return false;
        }

        $sum = 0;
        foreach ($values as $value) {
            $sum += $value;
        }

        return $sum;
    }

    /**
     * @param $values
     * @return int
     */
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
        return explode(self::DELIMITER, $string);
    }
}
