<?php
parse_str($_SERVER['QUERY_STRING']);
$Ar = $Artist;
$Al = $Album;
$client = new SoapClient("http://cdmolnet.se/CDService.asmx?WSDL");
$params->Artist =$_GET['artist'];
$params->Album = $_GET['album'];;
$result = $client->AlbumTracks($params)->AlbumTracksResult;
$TheAlbum = json_decode($result);
//echo var_dump($TheAlbum, true);
//echo $result;
$utPut .= "<table align='center'>";
foreach ($TheAlbum as &$value)
{
   // $utPut .= "<tr><td align='center' style='color:red;'>Artist/Group</td></tr>";
    $utPut .= "<tr><td align='center'>";
    $utPut .= $_GET['artist'];
    $utPut .= "</td></tr>";
    //$utPut .= "<tr><td align='center' style='color:red;'>Album title</td></tr>";
    $utPut .= "<tr><td align='center'>";
    $utPut .= $value->Album;
    $utPut .= "</td></tr>";
   // $utPut .= "<tr><td align='center' style='color:red;'>Coverart</td></tr>";
    $utPut .= "<tr><td align='center'>";
    $utPut .= "'<img src='";
    $utPut .= $value->Coverart;
    $utPut .= "' height='250' width='250'>";
    $utPut .= "</td></tr>";
    //$utPut .= "<tr><td align='center' style='color:red;'>Realease year</td></tr>";
    $utPut .= "<tr><td align='center'>";
    $utPut .= $value->Ar;
    $utPut .= "</td></tr>";
    //$utPut .= "<tr><td align='center' style='color:red;'>Genre</td></tr>";
    $utPut .= "<tr><td align='center'>";
    $utPut .= $value->Genre;
    $utPut .= "</td></tr>";
    $Latar = $value->Lat;
}
$utPut .= "</br>";

//Tracks
$utPut .= "<tr><td align='center'><h4>Tracks</h4></td></tr>";
$utPut .= "<tr><td align='center'>";
$utPut .= "<ol style'display:table; margin:0 auto;'>";
foreach ($Latar as $tracks)
{
    $utPut .= "<li>";
    $utPut .= $tracks->Title;
    $utPut .= "</li>";
}
$utPut .= "</td></tr>";
$utPut .= "</ol></table>";
echo $utPut;
?>