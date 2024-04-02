// var jQueryScript = document.createElement('script');  
// jQueryScript.setAttribute('src','https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js');
// document.head.appendChild(jQueryScript);

function encryptJS(message,sub_key) {
	var key = "@mva";
	var newKey = key + sub_key;
	var newFinalKey = CryptoJS.MD5(newKey);
	var finalKey = CryptoJS.enc.Utf8.parse(newFinalKey);
	var ivKey  = CryptoJS.enc.Utf8.parse('1234567891011121');

	var encrypted = CryptoJS.AES.encrypt(message, finalKey, { iv: ivKey });

	return encrypted.ciphertext.toString();
}

function decryptJS(message,sub_key) {
	var key = "@mva";
	var newKey = key + sub_key;
	var newFinalKey = CryptoJS.MD5(newKey);
	var finalKey = CryptoJS.enc.Utf8.parse(newFinalKey);
	var ivKey  = CryptoJS.enc.Utf8.parse('1234567891011121');

	let encryptedHexStr = CryptoJS.enc.Hex.parse(message);
	let srcs = CryptoJS.enc.Base64.stringify(encryptedHexStr);

	var decrypted = CryptoJS.AES.decrypt(srcs, finalKey, { iv: ivKey});
	return decrypted.toString(CryptoJS.enc.Utf8);
}