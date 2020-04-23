<?php
namespace App;

class Expense
{
    public $bin;
    public $amount;
    public $currency;
	
    function __construct()
    {

    }
	/* Get Bin */
	public function get_bin()
	{
		return $this->bin;
	}
	/* Get Amount */
	public function get_amount()
	{
		return $this->amount;
	}
	/* Get Currency */
	public function get_currency()
	{
		return $this->currency;
	}
	/* Set Bin*/
	public function set_bin($bin)
	{		
		$this->bin = $bin;		
	}
	/* Set Amount*/
	public function set_amount($amount)
	{
		$this->amount = $amount;
	}
	/* Set Currency*/
	public function set_currency($currency)
	{
		$this->currency = $currency;
	}
   
}
	
	
?>