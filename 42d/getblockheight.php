<?php

// Nice little function to get the current blockheight from 42d

function getBlockHeight() {

$data_string = '{"jsonrpc":"2.0", "method":"getblockcount", "params":{}}';

$ch = curl_init('http://localhost:12385/json_rpc');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_string))
);

curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

//execute post
$result = curl_exec($ch);

//close connection
curl_close($ch);

return $result; // Use string manipulation to get rid of the icky JSON stuff

}

?>
