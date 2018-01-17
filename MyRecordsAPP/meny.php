<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <style>
        .nav-glyphish-example .ui-btn {
            padding-top: 40px !important;
        }

            .nav-glyphish-example .ui-btn:after {
                width: 30px !important;
                height: 30px !important;
                margin-left: -15px !important;
                box-shadow: none !important;
                -moz-box-shadow: none !important;
                -webkit-box-shadow: none !important;
                -webkit-border-radius: 0 !important;
                border-radius: 0 !important;
            }

        #Myrecords:after {
            background: url("icons/13-target.png") 50% 50% no-repeat;
            background-size: 26px 18px;
        }

        #MyCD:after {
            background: url("icons/13-target.png") 50% 50% no-repeat;
            background-size: 26px 18px;
        }

        #signin:after {
            background: url("icons/111-user.png") 50% 50% no-repeat;
            background-size: 26px 18px;
        }

        #Statistik:after {
            background: url("icons/17-bar-chart.png") 50% 50% no-repeat;
            background-size: 26px 18px;
        }

        #MyVinyls:after {
            background: url("icons/221-recordplayer.png") 50% 50% no-repeat;
            background-size: 26px 18px;
        }

        #Addrecords:after {
            background: url("icons/187-pencil.png") 50% 50% no-repeat;
            background-size: 26px 18px;
        }

        #ByYear:after {
            background: url("icons/83-calendar.png") 50% 50% no-repeat;
            background-size: 26px 18px;
        }

        #Latest50:after {
            background: url("icons/33-cabinet.png") 50% 50% no-repeat;
            background-size: 26px 18px;
        }

        #Playlist:after {
            background: url("icons/65-note.png") 50% 50% no-repeat;
            background-size: 26px 18px;
        }

        #SignUp:after {
            background: url("icons/65-note.png") 50% 50% no-repeat;
            background-size: 26px 18px;
        }

        #Om:after {
            background: url("icons/84-lightbulb.png") 50% 50% no-repeat;
            background-size: 26px 18px;
        }
        #hem:after {
            background: url("icons/53-house.png") 50% 50% no-repeat;
            background-size: 26px 18px;
        }
    </style>
</head>
<body>
    <?php
    $Meny;
    $Meny .= '<li> <a href="index.php" id="hem" data-icon="custom">Home</a></li>';
    $Meny .= '<li><a href="#popupLogin" id="signin" data-rel="popup" data-position-to="window" data-transition="pop">Sign in</a></li>';
    $Meny .= '<li><a href="#" id="SignUp" data-icon="custom">Sign up</a></li>';
    $Meny .= '<li> <a href="Artists.php" id="Myrecords" data-icon="custom">All my Records</a></li>';
    $Meny .= '<li> <a href="ArtistsCD.php" id="MyCD" data-icon="custom">My CD:s</a></li>';
    $Meny .= '<li><a href="ArtistsVinyls.php" id="MyVinyls" data-icon="custom">My Vinyls</a></li>';
    $Meny .= '<li><a href="ByYear.php" id="ByYear" data-icon="custom">My reocords by year</a></li>';
    $Meny .= '<li><a href="addRecord.php" id="Addrecords" data-icon="custom">Add records</a></li>';
    $Meny .= '<li><a href="latestAlbums.php" id="Latest50" data-icon="custom">50 latest albums</a></li>';
    $Meny .= '<li><a href="playlist.php" id="Playlist" data-icon="custom">Random playlist</a></li>';
    $Meny .= '<li><a href="stat.php" id="Statistik" data-icon="custom">Statistics</a></li> ';
    $Meny .= '<li><a href="#" id="Om" data-icon="custom">About</a></li>';
    echo $Meny;
    ?>
</body>
</html>
