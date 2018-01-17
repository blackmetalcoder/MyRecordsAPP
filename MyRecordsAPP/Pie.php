<?php
$id =  '1';//$_SESSION['id'];
$client = new SoapClient("http://cdmolnet.se/CDService.asmx?WSDL");
$params->userId = $id;
$result = $client->media($params)->mediaResult;
$Pie = json_decode($result);
echo $Pie;
?>