<?php
include "Expense.php";
include "Util.php";

foreach (explode("\n", file_get_contents($argv[1])) as $row) {

    if (empty($row)) break;

	$dataArray = json_decode($row, true);
	 
	$expense = new App\Expense();
	$expense->set_bin($dataArray['bin']);
	$expense->set_amount($dataArray['amount']);
	$expense->set_currency($dataArray['currency']);
	
	$util = new App\Util();
    $isEu = $util->getBinResult($expense->get_bin());	
	$amntFixed = $util->getAmountFixed($expense->get_currency(),$expense->get_amount());
	
	ini_set('precision', 16);
	//echo $amntFixed * ($isEu == 'yes' ? 0.01 : 0.02);
	echo round($amntFixed * ($isEu == 'yes' ? 0.01 : 0.02),2);
	
    print "\n";
	
}

