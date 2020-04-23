<?php
namespace App;
class Util
{
   function __construct()
    {

    }
	/* Get Fixed Amount */
	function getAmountFixed($currency,$amount){
		
		if($this->is_connected()){
			ini_set('precision', 16);
			$rate = @json_decode(file_get_contents('https://api.exchangeratesapi.io/latest'), true)['rates'][$currency];
			if ($currency == 'EUR' or $rate == 0) {
				$amntFixed = $amount;
			}
			if ($currency != 'EUR' or $rate > 0) {
				$amntFixed = @($amount / $rate);
			}
			
			return $amntFixed;
		
		}else {
			echo 'Error: No internet!';
			exit;
		}
	}
    /* Get Common Fixed Amount */
	function getCommonAmountFixed($url, $currency, $amount){
		
		if($this->is_connected()){
			/**
			* @TODO
			*/
			$content = file_get_contents($url);
			$result = json_decode($content);
			
			return $result;
		} else {
			echo 'Error: No internet!';
			exit;
		}
	}		
	/**
	* Get Bin Result
	*/
	function getBinResult($bin){
		if($this->is_connected()){
			$binResults = file_get_contents('https://lookup.binlist.net/' .$bin);
			if (!$binResults)
				die('error!');
			$r = json_decode($binResults);
			$isEu = $this->isEu($r->country->alpha2);
					
		    return $isEu;
		}
        else {
			echo 'Error: No internet!';
			exit;
		}
	}
	/* Get Common Bin */
	function getCommonBinResult($url, $currency, $amount){
		
		if($this->is_connected()){
			/**
			* @TODO
			*/
		}
	}
	/**
	* Check internet connection
	*/
	function is_connected(){
		$connected = @fsockopen("www.example.com", 80); 
											//website, port  (try 80 or 443)
		if ($connected){
			$is_conn = true; //action when connected
			fclose($connected);
		}else{
			$is_conn = false; //action in connection failure
		}
		return $is_conn;

   }	
	/**
	* function isEu
	*/
	function isEu($c) {
		$result = false;
		switch($c) {
			case 'AT':
			case 'BE':
			case 'BG':
			case 'CY':
			case 'CZ':
			case 'DE':
			case 'DK':
			case 'EE':
			case 'ES':
			case 'FI':
			case 'FR':
			case 'GR':
			case 'HR':
			case 'HU':
			case 'IE':
			case 'IT':
			case 'LT':
			case 'LU':
			case 'LV':
			case 'MT':
			case 'NL':
			case 'PO':
			case 'PT':
			case 'RO':
			case 'SE':
			case 'SI':
			case 'SK':
				$result = 'yes';
				return $result;
			default:
				$result = 'no';
		}
		return $result;
	}
}
?>