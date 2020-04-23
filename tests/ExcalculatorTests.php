<?php

namespace Tests;
namespace App;
include "src\Expense.php";
include "src\Util.php";

 
class ExcalculatorTests extends \PHPUnit_Framework_TestCase
{
    private $excalculator;
 
    
	/**
	* Get Bin
	*/	
	public function testExpenseGetBin()
    {
        $expense = new \App\Expense();
        $expense->set_bin(45717360);
        $this->assertTrue($expense->get_bin() === 45717360);
    }
	
	/**
	* Get Currency
	*/
	public function testExpenseGetCurrency()
    {
        $expense = new \App\Expense();
        $expense->set_currency('EUR');
        $this->assertTrue($expense->get_currency() === 'EUR');
    }
	
	/**
	* Get Amount
	*/
	public function testExpenseGetAmount()
    {
        $expense = new \App\Expense();
        $expense->set_amount(100.00);
        $this->assertTrue($expense->get_amount() === 100.00);
    }
	/**
	* Test Bin
	*/
	/*public function testBin()
    {   $util = new App\Util();
		$result = $util->getBinResult(45717360);	 
	    $this->assertEquals('yes', $result);
    }
	*/
	/**
	* Test amount
	*/
	/*public function testAmount()
    {
        $result = $this->testAmountFixed(100.00, 'EUR');
		//$this->assertEquals(100.00, $result, '', 0.00001);
        $this->assertEquals(100.00, $result);
    }*/

}	
 