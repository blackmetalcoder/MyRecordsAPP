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
        $result = $client->getArtistVinyl10($params)->getArtistVinyl10Result;
        $Artister = json_decode($result);
        $HTML;
        $HTML .= '<div class="row">
        ';
        $HTML .= '<div class="col-md-4">
            ';
        $HTML .= '<ul data-role="listview" data-filter="true" data-input="#myFilter" data-autodividers="true" data-inset="true" id="sortedList">';
        foreach ($Artister as &$value)
        {
            $HTML .= "<li><a href='AlbumsVinyl.php?q=";
            $HTML .= $value->artistVinyl;
            $HTML .= "'>";
            $HTML .= $value->artistVinyl;
            $HTML .= '</li></a>';
        }
        $HTML .= '</ul>';
        echo $HTML;
    }
    ?>
    <div data-role="page" id="ArtistsCD" data-theme="b">
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

        <div data-role="popup" id="popupJump" data-overlay-theme="b" data-theme="b" class="ui-corner-all">
            <div role="main" class="ui-content" data-theme="b">
                <form id="Jumplist">
                    <fieldset data-role="controlgroup" data-type="horizontal" data-mini="true" data-theme="b" data-inline="true">
                        <input type="radio" name="Jump" id="a" value="A" />
                        <label for="a">A</label>
                        <input type="radio" name="Jump" id="b" value="B" />
                        <label for="b">B</label>
                        <input type="radio" name="Jump" id="c" value="C" />
                        <label for="c">C</label>
                        <input type="radio" name="Jump" id="d" value="D" />
                        <label for="d">D</label>
                        <input type="radio" name="Jump" id="e" value="E" />
                        <label for="e">E</label>
                        <input type="radio" name="Jump" id="f" value="F" />
                        <label for="f">F</label>
                        <input type="radio" name="Jump" id="g" value="G" />
                        <label for="g">G</label>
                        <input type="radio" name="Jump" id="h" value="H" />
                        <label for="h">H</label>
                        <input type="radio" name="Jump" id="i" value="I" />
                        <label for="i">I</label>
                        <input type="radio" name="Jump" id="j" value="J" />
                        <label for="j">J</label>
                        <input type="radio" name="Jump" id="k" value="K" />
                        <label for="k">K</label>
                        <input type="radio" name="Jump" id="l" value="L" />
                        <label for="l">L</label>
                        <input type="radio" name="Jump" id="m" value="M" />
                        <label for="m">M</label>
                        <input type="radio" name="Jump" id="n" value="N" />
                        <label for="n">N</label>
                        <input type="radio" name="Jump" id="o" value="O" />
                        <label for="o">O</label>
                        <input type="radio" name="Jump" id="p" value="P" />
                        <label for="p">P</label>
                        <input type="radio" name="Jump" id="q" value="Q" />
                        <label for="q">Q</label>
                        <input type="radio" name="Jump" id="r" value="R" />
                        <label for="r">R</label>
                        <input type="radio" name="Jump" id="s" value="S" />
                        <label for="s">S</label>
                        <input type="radio" name="Jump" id="t" value="T" />
                        <label for="t">T</label>
                        <input type="radio" name="Jump" id="u" value="U" />
                        <label for="u">U</label>
                        <input type="radio" name="Jump" id="v" value="V" />
                        <label for="v">V</label>
                        <input type="radio" name="Jump" id="x" value="X" />
                        <label for="x">X</label>
                        <input type="radio" name="Jump" id="y" value="Y" />
                        <label for="y">Y</label>
                        <input type="radio" name="Jump" id="z" value="z" />
                        <label for="z">Z</label>
                    </fieldset>
                </form>
            </div>
        </div>
        <div data-role="panel" data-display="push" id="myPanel" data-theme="b">
            <h2>MyRecords</h2>
            <ul data-role="listview">
                <?php include 'meny.php';?>
            </ul>
        </div>
        <div data-role="header" data-theme="b" id="Topheader" data-position="fixed">
            <h5>My Artists/Groups</h5>
            <a href="#" data-icon="back" data-rel="back" title="Go back">Back</a>
            <a href="#popupJump" data-rel="popup" data-position-to="window" data-transition="pop" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-navigation ui-btn-icon-left ui-btn-b">Quick jump</a>
        </div>


        <form class="ui-filterable">
            <input id="myFilter" data-type="search" />
        </form>
        <?php
        $id =  $_SESSION['id'];
        if(!empty ($id))
        {
            getArtsist($id);
        }
        ?>
    </div>

</body>
</html>