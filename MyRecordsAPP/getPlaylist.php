<?php
session_start();
$client = new SoapClient("http://cdmolnet.se/CDService.asmx?WSDL");
$id =  $_SESSION['id'];
$params->User = $id;
$params->Media = $_GET['m'];
$params->antal = $_GET['a'];
$result = $client->RandomAlbum($params)->RandomAlbumResult;
$Artister = json_decode($result);
$HTML;
foreach ($Artister as &$value)
{
    $HTML .= '<li id="list" style="margin : 5px;">';
    $HTML .= '<img src="';
    $HTML .=  $value->Cover;
    $HTML .= '">';
    $HTML .= '<p><h2>';
    $HTML .= $value->Artist;
    $HTML .= '</h2>';
    $HTML .= $value->album;
    $HTML .= ' , ';
    $HTML .= $value->Media;
    $HTML .= "</p>";
    $HTML .= '</li>';
}
//$HTML .= '</ul>';
echo $HTML;
?>