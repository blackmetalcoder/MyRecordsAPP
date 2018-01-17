<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="Content/jquery.mobile-1.4.5.min.css" rel="stylesheet" />
    <link href="Content/jquery.mobile.theme-1.4.5.min.css" rel="stylesheet" />
    <script src="Scripts/jquery-1.8.0.min.js"></script>
    <script src="Scripts/jquery.mobile-1.4.5.min.js"></script>
</head>

<body>
    <!-- Standard page -->
    <div data-role="page" id="standard" data-add-back-btn="true" data-theme="b">
        <div data-role="header">
            <h1>Tracks</h1>
        </div>
        <div data-role="content">
            <?php
            $q=$_GET["q"];
            $id =  $_SESSION['id'];
            $client = new SoapClient("http://cdmolnet.se/CDService.asmx?WSDL");
            $params->userID = $id;
            $params->DiscID = $q;
            $result = $client->getTracks10($params)->getTracks10Result;
            $Tracks = json_decode($result);
            $HTML;
            $HTML .= '<ol data-role="listview">';
            foreach ($Tracks as &$value) {
                $HTML .= '<li>';
                $HTML .= $value->track;
                $HTML .= '</li>';
            }
            $HTML .= '</ol>';
            echo $HTML;
            ?>
        </div>
    </div>
</body>
</html>