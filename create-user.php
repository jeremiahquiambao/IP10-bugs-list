<?php
include "vendor/autoload.php";
  use GuzzleHttp\Client;
  use GuzzleHttp\Psr7\Request;

$client = new Client();
$headers = [
  'Authorization' => 'rVrcBecn94VY9eiQe2i5gWxzelmWahHV', 
  'Content-Type' => 'application/json'
];
$body = '{
  "username": "jeremiahquiambao3",
  "password": "win09052021",
  "real_name": "Jeremiah Quiambao",
  "email": "quiambao.jeremiah@auf.edu.ph3",
  "access_level": {
    "name": "updater"
  },
  "enabled": false,
  "protected": false
}';
$request = new Request('POST', 'https://ipt10-2022.mantishub.io/api/rest/users/', $headers, $body);
$res = $client->sendAsync($request)->wait();
echo $res->getBody();
