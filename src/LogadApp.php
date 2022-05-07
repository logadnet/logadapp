<?php
namespace LogadApp;

class Logad {
	public static $currency = "₦";

	## Generate random string ##
	public static function GenerateKey($minlength = 20, $maxlength = 20, $uselower = true, $useupper = true, $usenumbers = true, $usespecial = false, $useZero = true) {
		$charset = '';
		if ($uselower) {
			$charset .= "abcdefghijklmnopqrstuvwxyz";
		}
		if ($useupper) {
			$charset .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		}
		if ($usenumbers) {
			if ($useZero) {
				$charset.= "0";
			}
			$charset .= "123456789";
		}
		if ($usespecial) {
			$charset .= "~@#$%^*()_+-={}|][";
		}
		if ($minlength > $maxlength) {
			$length = mt_rand($maxlength, $minlength);
		} else {
			$length = mt_rand($minlength, $maxlength);
		}
		$key = '';
		for ($i = 0; $i < $length; $i++) {
			$key .= $charset[(mt_rand(0, strlen($charset) - 1))];
		}
		return $key;
	}

	## Format amounts ##
	public static function amountFormat(float $amount, $addCurrency = false) {
		if ($addCurrency) {
			return self::$currency.number_format($amount, 2);
		} else {
			return number_format($amount, 2);
		}
	}

	## Format timestamp ##
	public static function dateFormat($date, $customFormat = false) {
		if ($customFormat) {
			return date($customFormat, $date);
		}
		return date('d M, Y', $date);
	}
}