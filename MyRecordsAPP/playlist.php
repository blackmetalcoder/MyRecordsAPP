<?php
session_start();
?>
<!DOCTYPE html>
<html lang="sv-SE">
<head>
    <meta charset="UTF-8" />
    <title>Playlist</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="Content/jqm-icon-pack-fa.css" rel="stylesheet" />
    <link href="Content/jquery.mobile-1.4.5.min.css" rel="stylesheet" />
    <link href="Content/jquery.mobile.theme-1.4.5.min.css" rel="stylesheet" />>
    <link href="Content/App.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700" />
    <script src="Scripts/jquery-1.8.0.min.js"></script>
    <script src="Scripts/jquery.mobile-1.4.5.min.js"></script>
    <style>
        .listitem {
            margin-top: 10px !important;
        }

        #playlist {
            -webkit-box-shadow: none;
            box-shadow: none;
            border: none;
        }

            #list .ui-li {
                border: none;
            }
    </style>
</head>

<body>
    <div data-role="page" id="Playlist" data-theme="b">
        <script>
            $(document).on("pagecreate", function (event) {

                $('#btnGetAlbums').on('click', function () {
                    var antal = $("#slider-antal").val();
                    var media = $('input[name=radioMedia]:checked').val();
                        $.ajax({
                            url: 'getPlaylist.php',
                            type: 'GET',
                            data: {
                                m: media,
                                a: antal
                            },
                            success:function(response){
                                $('#playlist').empty();
                                $('#playlist').append($(response));
                                $('#playlist').trigger('create');
                                $('#playlist').listview('refresh');
                            }
                        });
                    });
                });
        </script>
        <div data-role="header" data-theme="b" id="Topheader" data-position="fixed">
            <h5>Create playlist</h5>
            <a href="#" data-icon="back" data-rel="back" title="Go back">Back</a>
        </div>
        <div role="main" class="ui-content">
                <fieldset data-role="controlgroup" data-type="horizontal" data-mini="true" id="media" name ="smoker">
                    <legend>Choose media:</legend>
                    <input type="radio" name="radioMedia" id="radio-choice-h-6a" value="Vinyl" checked="checked" />
                    <label for="radio-choice-h-6a">Vinyl</label>
                    <input type="radio" name="radioMedia" id="radio-choice-h-6b" value="CD" />
                    <label for="radio-choice-h-6b">CD</label>
                    <input type="radio" name="radioMedia" id="radio-choice-h-6c" value="Tape" />
                    <label for="radio-choice-h-6c">Tape</label>
                </fieldset>
                <label for="slider-2">How many:</label>
                <input type="range" id="slider-antal" value="5" min="1" max="15" data-highlight="true" />
            <button id="btnGetAlbums">Get playlist</button>
            <?php
            $id =  $_SESSION['id'];
            if(!empty ($id))
            {
               // getLatest($id);
            }
            ?>
            <br />
            <ul id="playlist" data-role="listview" data-inset="false" data-theme="b"></ul>
</div><!-- /content -->
    </div>
</body>
</html>