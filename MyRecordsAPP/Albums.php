<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="Content/jquery.mobile-1.4.5.min.css" rel="stylesheet" />
    <link href="Content/jquery.mobile.theme-1.4.5.min.css" rel="stylesheet" />
    <script src="Scripts/jquery-1.8.0.min.js"></script>
    <script src="Scripts/jquery.mobile-1.4.5.js"></script>

</head>

<body>
        <div data-role="page" id="Artists" data-theme="b">
        <div data-role="header" style="padding:10px;">
            <a href="#" data-icon="back" data-rel="back" title="Go back">Back</a>
        </div>

        <div data-role="main" class="ui-content">
            <?php
            $q=$_GET["q"];
            $id =  $_SESSION['id'];
            $client = new SoapClient("http://cdmolnet.se/CDService.asmx?WSDL");
            $params->userID = $id;
            $params->Artist = $q;
            $result = $client->getAlbum10($params)->getAlbum10Result;
            $Artister = json_decode($result);
            $HTML;
            $HTML .= '<ul data-role="listview" data-inset="true">';
            $antal = count($Artister);
            $iLoop = $antal / 4;
            foreach ($Artister as &$value) {
                $HTML .= '<li>';
                $HTML .= "<a href='tracks.php?q=";
                $HTML .=  $value->discID;
                $HTML .= "'";;
                $HTML .= ' class="ui-shadow ui-btn ui-corner-all ui-btn-inline" data-rel="dialog" data-transition="pop">';
                $HTML .= '<img src="';
                $HTML .= $value->Cover;
                $HTML .= '"><p>';
                $HTML .= $value->album;
                $HTML .='</p>';
                $HTML .= $value->Ar;
                $HTML .= '</p>';
                $HTML .= '<p>';
                $HTML .= $value->Media;
                $HTML .= '</p>';
                $HTML .= '</a>';
                $HTML .= "</li>";
            }
            $HTML .= '</ul>';
            echo $HTML;
            ?>
           
        </div>

        <!--<div data-role="footer" data-position="fixed">
            <p style="font-size: 12px">Blackmetalcoder &copy; 2017</p>
        </div>-->
    </div>
</body>
</html>