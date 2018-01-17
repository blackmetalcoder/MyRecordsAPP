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
    function getArtsist($id)
    {
        $client = new SoapClient("http://cdmolnet.se/CDService.asmx?WSDL");
        $params->userID = $id;
        $result = $client->getArtist10($params)->getArtist10Result;
        $Artister = json_decode($result);
        $HTML;
        $HTML .= '<div class="row">
        ';
        $HTML .= '<div class="col-md-4">
            ';
        $HTML .= '<ul data-role="listview" data-filter="true" data-input="#myFilter" data-autodividers="true" data-inset="true" id="sortedList">';
        foreach ($Artister as &$value)
        {
            $HTML .= "<li><a href='Albums.php?q=";
            $HTML .= $value->artist;
            $HTML .= "'>";
            $HTML .= $value->artist;
            $HTML .= '</li></a>';
        }
        $HTML .= '</ul>';
        echo $HTML;
    }
    ?>
    <div data-role="page" id="Artists" data-theme="b">
        <script>
            $(document).on("pagecreate", function (event) {

                $('#Jumplist input').on('change', function () {
                    var top,
                    letter = $('input[name="Jump"]:checked', '#Jumplist').val(),
                    divider = $("#sortedList").find("li.ui-li-divider:contains(" + letter + ")");
                    if (divider.length > 0) {
                        top = divider.offset().top;
                        $.mobile.silentScroll(top);
                    } else {
                        return false;
                    }
                });
            });
        </script>

        </div>
        <div data-role="header" data-theme="b" id="Topheader" data-position="fixed">
            <h5>Albums by year</h5>
                        <a href="#" data-icon="back" data-rel="back" title="Go back">Back</a>
        </div>


        <form class="ui-filterable">
            <input id="myFilter" data-type="search" />
        </form>
        <?php
        $id =  $_SESSION['id'];
        if(!empty ($id))
        {
            //getArtsist($id);
        }
        ?>
    </div>

</body>
</html>