<!DOCTYPE html>
<html>
<head>
  <?php
     $q=$_GET["q"];
     $client = new SoapClient("http://cdmolnet.se/CDService.asmx?WSDL");
     $params->userID = '1';
     $params->Artist = $q;
     $result = $client->getAlbum10($params)->getAlbum10Result;
     $Albums = json_decode($result);
     echo $Albums;
    ?>

