<?php
include "vendor/autoload.php";
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

// Token24
define('TOKEN', 'rVrcBecn94VY9eiQe2i5gWxzelmWahHV'); 
define('MANTISHUB_URL', 'https://ipt10-2022.mantishub.io/');
$client = new Client();
$headers = [
  'Authorization' => TOKEN
];
$request = new Request('GET', MANTISHUB_URL.'api/rest/issues?page_size=10&page=1', $headers);
$res = $client->sendAsync($request)->wait();
$bugs = $res->getBody()->getContents();

$bugs_list = json_decode($bugs);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>IP10 Bugs</title>
</head>
<body>
    <h1>IP10 Bugs List</h1>
    <h2><u>Jeremiah C. Quiambao</h2>


<table class="table table-bordered">
<tr>
  <th>ID</th>
  <th>Summary</th>
  <th>Severity</th>
  <th>Status</th>
</tr>


<?php
      foreach ($bugs_list->issues as $bug)
    {
      ?>
    <tbody>
      <tr>
        <td><?php echo $bug->id; ?> </td>
        <td><?php echo $bug->summary; ?> </td>
        <td><?php echo $bug->severity->name ?> </td>
        <td><?php echo $bug->status->name ?> </td>
      </tr>
      <?php
    }
    ?>
    </tbody>
    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>

