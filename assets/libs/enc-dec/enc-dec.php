<?php


function encrypt($string,$sub_key){
	$ciphering = "AES-256-CBC";
	$iv_length = openssl_cipher_iv_length($ciphering);
	$options = 1;
	$key = "@mva";
	$iv = '1234567891011121';

	$newKey = $key . $sub_key;
	$newFinalKey = md5($newKey);

	$encryption = openssl_encrypt($string, $ciphering,
	$newFinalKey, $options, $iv);
	return bin2hex($encryption);
}

function decrypt($string,$sub_key){
	$ciphering = "AES-256-CBC";
	$iv_length = openssl_cipher_iv_length($ciphering);
	$options = 1;
	$key = "@mva";
	$iv = '1234567891011121';
	
	$newKey = $key . $sub_key;
	$newFinalKey = md5($newKey);

	$decryption = openssl_decrypt(hex2bin($string), $ciphering,
	$newFinalKey, $options, $iv);
	return strval($decryption);
}



?>