<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="Content/jqm-icon-pack-fa.css" rel="stylesheet" />
    <link href="Content/jquery.mobile-1.4.5.min.css" rel="stylesheet" />
    <link href="Content/jquery.mobile.theme-1.4.5.min.css" rel="stylesheet" />
    <link href="Content/App.css" rel="stylesheet" />
    <!--<script src="Scripts/jquery-1.8.0.min.js"></script>-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
    <script src="Scripts/jquery.cookie-1.4.1.min.js"></script>
    <script src="Scripts/jquery.mobile-1.4.5.min.js"></script>
    <style>
        #index .ui-panel-page-content-position-left {
            -webkit-box-shadow: -5px 0px 5px rgba(85, 152, 202, 0.75);
            -moz-box-shadow: -5px 0px 5px rgba(85, 152, 202, 0.75);
            box-shadow: -5px 0px 5px rgba(85, 152, 202, 0.75);
        }
    </style>
</head>

<body>
    <?php
    /*Gör att skicka info till användarem*/
    function VinylAlert($msg) {
        $info .= '<script type="text/javascript">';
        $info .= '$("info").html("<h1>Welcome</h1>")';
        $info .= '</script>';
           }

    /*Kollar om det fonns cookie på användaruppgifter sparade*/
    if($_COOKIE['id'] != '') {
        $_SESSION['valid'] = true;
        $_SESSION['timeout'] = time();
        $_SESSION['id'] = $_COOKIE["id"];
        VinylAlert("You are logges in!");
        echo 'You are logges in!';
    }
    /*Slut autoinlogg*/
    $msg = '';
    if (!empty($_POST['user']) && !empty($_POST['pw'])) {
        $client = new SoapClient("http://cdmolnet.se/CDService.asmx?WSDL");
        $params->usernamn = $_POST['user'];
        $params->password = $_POST['pw'];
        $result = $client->loggaIn($params)->loggaInResult;
        $User = json_decode($result);
        if ($result != 'NO') {
            $myInfo = explode(';', $result);
            $_SESSION['valid'] = true;
            $_SESSION['timeout'] = time();
            $_SESSION['id'] = $myInfo[1];
            VinylAlert("You are logges in!");
            if(!empty($_POST['komIhag'])) //vi loggar in automatsikt n�sta g�ng
            {
                $cookie_name =  $myInfo[0];
                $cookie_id =  $myInfo[1];;
                setcookie('id', $cookie_id, time() + (86400 * 30), "/"); // 86400 = 1 day
                setcookie('name', $cookie_name, time() + (86400 * 30), "/"); // 86400 = 1 day
            }
        }else {
            $msg = 'Wrong username or password';
            VinylAlert($msg);
        }
    }
    ?>
    <div data-role="page" id="index" data-theme="b">
        <script>
            $(document).on("pagecreate", function (event) {

                var inloggad = $.cookie("id");
                var namn = $.cookie("name");
                if (inloggad != '') {
                    //$("info").html("<h1>Welcome</h1>");
                    document.getElementById("info").innerHTML = "<h3>Welcome: " + namn + "</h3>";
                }

            });
        </script>
        <div data-role="popup" id="popupLogin" data-theme="a" class="ui-corner-all">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                method="post">
                <div style="padding:10px 20px;">
                    <h3>Please sign in</h3>
                    <label for="un" class="ui-hidden-accessible">Username:</label>
                    <input type="text" name="user" id="user" value="" placeholder="username" data-theme="a" />
                    <label for="pw" class="ui-hidden-accessible">Password:</label>
                    <input type="password" name="pw" id="pw" value="" placeholder="password" data-theme="a" />
                    <label for="komIhag">Remember me</label>
                    <input type="checkbox" name="komIhag" id="komIhag" data-theme="a" />
                    <button type="submit" class="ui-btn ui-corner-all ui-shadow ui-btn-b ui-btn-icon-left ui-icon-check">Sign in</button>
                </div>
            </form>
        </div>
        <div data-role="panel" data-display="push" id="myPanel" data-theme="b">
            <h2>MyRecords</h2>
            <ul data-role="listview">
                <?php include 'meny.php';?>
            </ul>
        </div>
        <div data-role="main" class="ui-content">
            <p id="info" style="text-align:center">
                
            </p>
            <br />
            <br />
            <div class="Logo">
                <img src="icons/Square150x150Logo.scale-125.png" />
            </div>

        </div>
        <div data-role="footer" data-position="fixed">
            <div class="ui-grid-a">
                <div class="ui-block-b">
                    <a href="#myPanel" class="jqm-navmenu-link ui-btn ui-btn-icon-notext ui-corner-all ui-icon-bars ui-nodisc-icon ui-alt-icon ui-btn-left">Menu</a>
                </div>
                <div class="ui-block-b">
                    <p style="font-size: 12px">Blackmetalcoder &copy; 2017</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>