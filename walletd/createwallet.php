<?php



function createWallet() {

// JSON strings can also be turned into arrays if you fancy that
// $data = array("jsonrpc" => "$jsonrpc", "id" => "$id", "password" => "$password", "method" => "$method");
$data_string = '{"jsonrpc":"2.0","id":"1","password":"yourpass","method":"createAddress","params":{}}';


$ch = curl_init('http://localhost:4242/json_rpc');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_string))
);

curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);


$result = curl_exec($ch);

curl_close($ch);

// This spits out the pure json rpc request return

// echo $result;

$preaddress = substr($result, 47, -3); // makes the preaddress aka basically just the address without the rest of the JSON data

// To put in the function return value into a variable
return $preaddress;
}

// $userAddress = createWallet();

?>
