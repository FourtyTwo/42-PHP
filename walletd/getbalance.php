<?php
// A nice function that returns the balance of any given wallet address

function getBalance() {
$addr = "foUrYRgmp5cRnYYN1wmqy4LLbzLtkiUsQLpy3kQKEQV9VPENoXXtg6L7QAJJTBRPSsCoSRww2CVAcZJJx1jZn38h854US5oUc5"; // This could be something different entirely, for example

// $addr = $_SESSION['address']; // If you have a wallet address already declared in the session you could do something like that
$data_string = '{"jsonrpc":"2.0","id":"1","password":"yourpassword","method":"getBalance","params":{"address":"' . "$addr" . '"}}';

$ch = curl_init('http://localhost:4242/json_rpc');  // you can change localhost:4242 to whatever IP:port you have your walletd set on
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_string))
);

curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

// Sends the JSON RPC request to the walletd and puts the result in a variable
$result = curl_exec($ch);

// Closes connection
curl_close($ch);

echo $result; // This returns the entire JSON response but you can cut out all that with string manipulation
}


?>
