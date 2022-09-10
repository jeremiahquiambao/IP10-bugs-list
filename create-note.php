<?php
$client = new Client();
$headers = [
  'Authorization' => 'rVrcBecn94VY9eiQe2i5gWxzelmWahHV',
  'Content-Type' => 'application/json'
];
$body = '{
  "quiambao.jeremiah@auf.edu.ph": "test note",
  "view_state": {
    "name": "public"
  }
}';
$request = new Request('POST', 'https://ipt10-2022.mantishub.io/api/rest/issues/[ISSUE_NUMBER]/notes', $headers, $body);
$res = $client->sendAsync($request)->wait();
echo $res->getBody();
