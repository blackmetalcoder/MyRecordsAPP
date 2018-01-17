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
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700" />
    <!--<script src="Scripts/jquery-1.8.0.min.js"></script>-->
    <script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="Scripts/jquery.mobile-1.4.5.min.js"></script>
</head>

<body>
   
    <div data-role="page" id="NewAlbum" data-theme="b">
        <script>
            $(document).on("pagecreate", function (event) {
                $("#search").hide();
                $("#btnGet").click(function () {
                    $("#search").show();
                    var a = $("#Artist").val();
                    var al = $("#Album").val();
                    $.ajax({
                        url: 'getAlbumGracenote.php',
                        type: 'GET',
                        data: {
                            artist: a,
                            album: al
                        },
                        success: function (response) {
                            $('#txtResonse').empty();
                            $('#txtResonse').append($(response));
                            $("#popupAlbum").popup("close");
                            $("#search").hide();
                        }
                    });
                });
                
            });
            
        </script>
        <div data-role="popup" id="popupAlbum" data-theme="b" class="ui-corner-all">
                <div style="padding:10px 20px;">
                    <h3>Get album info</h3>
                    <label for="Artist" class="ui-hidden-accessible">Arstist/group:</label>
                    <input type="text" id="Artist" name="Artist" placeholder="Artist/group" data-theme="a" />
                    <label for="pw" class="ui-hidden-accessible">Password:</label>
                    <input type="text" id="Album" name="Album" placeholder="Album" data-theme="a" />
                    <div id="search" style="margin: auto; width: 50%;">
                        <img id="loaderFind" src="icons/magnify.gif" height="50" width="50" />
                    </div>                 
                    <button id="btnGet" class="ui-btn ui-corner-all ui-shadow ui-btn-b ui-btn-icon-left ui-icon-check">Get album</button>
                </div>
        </div>
        <div data-role="header" data-theme="b" id="Topheader" data-position="fixed">
            <h5>Add record</h5>
            <a href="#" data-icon="back" data-rel="back" title="Go back">Back</a>
            <a href="#popupAlbum" data-rel="popup" data-position-to="window" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-search ui-btn-icon-left ui-btn-b" data-transition="pop">Get album</a>
            
         </div>
        <div role="main" class="ui-content">
            <div id="txtResonse"></div> 
        </div><!-- /content -->
        <div data-role="footer" data-position="fixed">
            <div class="ui-grid-a">
                <div class="ui-block-b">
                    <a href="#" class="ui-btn ui-btn-inline ui-icon-edit ui-btn-icon-right">Save</a>
                </div>
                <div class="ui-block-b">
                    <p style="font-size: 12px">Blackmetalcoder &copy; 2017</p>
                </div>
            </div>
        </div>
        </div>
    
        <?php
        $id =  $_SESSION['id'];
        if(!empty ($id))
        {
            //getArtsist($id);
        }
        ?>
</body>
</html>