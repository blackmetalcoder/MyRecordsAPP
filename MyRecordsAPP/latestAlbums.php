<?php
session_start();
?>
<!DOCTYPE html>
<html lang="sv-SE">
<head>
    <meta charset="UTF-8" />
    <title>Artister</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="Content/jqm-icon-pack-fa.css" rel="stylesheet" />
    <link href="Content/jquery.mobile-1.4.5.min.css" rel="stylesheet" />
    <link href="Content/jquery.mobile.theme-1.4.5.min.css" rel="stylesheet" />>
    <link href="Content/App.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700" />
    <script src="Scripts/jquery-1.8.0.min.js"></script>
    <script src="Scripts/jquery.mobile-1.4.5.min.js"></script>
</head>

<body>
    <?php
    function getLatest($id)
    {
        $client = new SoapClient("http://cdmolnet.se/CDService.asmx?WSDL");
        $params->userId = $id;
        $result = $client->senasteInnlagda10($params)->senasteInnlagda10Result;
        $Artister = json_decode($result);
        $HTML;
        $HTML .= '<ul data-role="listview" data-inset="true">';
        foreach ($Artister as &$value)
        {
            $HTML .= '<li>';
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
        $HTML .= '</ul>';
        echo $HTML;
    }
    ?>
    <div data-role="page" id="latestAlbums" data-theme="b">

        <div data-role="header" data-theme="b" id="Topheader" data-position="fixed">
            <h5>Latest albums</h5>
            <a href="#" data-icon="back" data-rel="back" title="Go back">Back</a>
        </div>
        <div role="main" class="ui-content">
            <?php
            $id =  $_SESSION['id'];
            if(!empty ($id))
            {
                getLatest($id);
            }
            ?>
        </div><!-- /content -->
    </div>  
</body>
</html>