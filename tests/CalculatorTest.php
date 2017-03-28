<?php
/**
 * @author Serghei Luchianenco (s@luchianenco.com)
 * Date: 27/03/2017
 * Time: 14:02
 */

namespace Tests;

use App\Calculator;
use PHPUnit\Framework\TestCase;

final class CalculatorTest extends TestCase
{
    /**
     * @var Calculator
     */
    private $calculator;

    public function setUp()
    {
        $this->calculator = new Calculator();
    }

    public function testCanAdd()
    {
        $calculator = new Calculator();

        $action = $this->calculator->add('1');

        $this->assertNotNull($action);
    }

    public function testAddEmptyString()
    {
        $numbers = '';

        $actions = $this->calculator->add($numbers);

        $this->assertEmpty($actions);
    }

    public function testAddOneNumber()
    {
        $numbers = '2';

        $action = $this->calculator->add($numbers);

        $this->assertEquals($action, 4);
    }

    public function testAddTwoNumbers()
    {
        $numbers = '1,2';

        $action = $this->calculator->add($numbers);

        $this->assertEquals($action, 3);
    }

    public function testAddMoreThanTwoNumbers()
    {
        $numbers = '1,2,3,10,100';

        $action = $this->calculator->add($numbers);

        $this->assertEquals($action, 116);
    }
}
