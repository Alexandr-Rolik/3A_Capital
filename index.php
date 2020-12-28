<?php
if (isset($_GET['lang'])) {
    $language = $_GET['lang'];
    setcookie("lang", $language, time() + 15552000000);
} elseif (isset($_COOKIE['lang'])) {
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'index.php?lang=';
    $lang = $_COOKIE['lang'];
    header("Location: http://$host$uri/$extra$lang");
    exit;
}

?>

<?php
include('lang/lang.php');
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>AAA Capital</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <?php
    require_once 'connect.php';

    if (isset($_POST['login']) && isset($_POST['password'])) {

        $link = mysqli_connect($host, $user, $password, $database)
            or die("Ошибка " . mysqli_error($link));


        $login = htmlentities(mysqli_real_escape_string($link, $_POST['login']));
        $password = htmlentities(mysqli_real_escape_string($link, $_POST['password']));
        $email = htmlentities(mysqli_real_escape_string($link, $_POST['email']));
        $phone = htmlentities(mysqli_real_escape_string($link, $_POST['phone']));


        // Проверка на наличие юзера с такими регистрационными данными

        $check1 = mysqli_query($link, "SELECT * FROM user WHERE login = '$login'") or die("Ошибка " . mysqli_error($link));
        $check2 = mysqli_query($link, "SELECT * FROM user WHERE email = '$email'") or die("Ошибка " . mysqli_error($link));
        $check3 = mysqli_query($link, "SELECT * FROM user WHERE phone = '$phone'") or die("Ошибка " . mysqli_error($link));

        $rows1 = mysqli_num_rows($check1);
        $rows2 = mysqli_num_rows($check2);
        $rows3 = mysqli_num_rows($check3);

        if ($rows1 == 0 and $rows2 == 0 and $rows3 == 0) {

            $query = "INSERT INTO user VALUES (NULL, '$login', '$password', '$email', '$phone', 0)";

            $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
            if ($result) {
                echo $lang['alert'];
                echo "<script>document.location.href = 'login.php'</script>";
            }
        } else {
            echo $lang['alertdenie'];
        }
        mysqli_close($link);
    }
    ?>
    <div class="background">
        <header id="header">
            <div class="container">
                <div class="header_logo">AAA Capital</div>
                <a href="index.php?lang=ua" onclick="alert('Обрана мова - Українська')"><img src="images/langboxes/ukr.png" height="30"></a>
                <a href="index.php?lang=ru" onclick="alert('Выбранный язык - Русский')"><img src="images/langboxes/rus.png" height="30"></a>
                <a href="index.php?lang=eng" onclick="alert('Chosen language - English')"><img src="images/langboxes/eng.png" height="30"></a><br>
                <a class="link" href="page.html"><?= $lang['page1'] ?></a>
                <a class="link" href="table.html"><?= $lang['page2'] ?></a>
            </div>
        </header>
        <div class="slogan">
            <p><?= $lang['slogan'] ?></p>
            <?= $lang['wish'] ?>
        </div>
        <div style="padding-left: 10px;">
            <a class="link" href="review.html"><?= $lang['review1'] ?></a>
            <a class="link" href="review2.html"><?= $lang['review2'] ?></a>
            <a class="link" href="review3.html"><?= $lang['review3'] ?></a>
        </div>

        <div class="table">
            <div>
                <table border="1">
                    <?= $lang['table'] ?>
                    </tr>
                </table>
            </div>
        </div>
        <div class="form">
            <!--  <form action="https://mobile-review.com/news/obnaruzhena-novaya-skam-sxema-obmana-predprinimatelej-v-internete"> -->
            <!-- <form action="#">
                <p><label for="age">Введіть своє ім'я: </label><input id="age" title="Ми питаємо Ваше ім'я, щоб знати як до Вас звертатись."></p>
                <fieldset>
                    <label for="price">Сколько вы хотите инвестировать:</label>
                    <select name="price" id="price">
                        <option value="bomj">100</option>
                        <option value="middle">2000</option>
                        <option value="krutelyk" selected="selected">5000</option>
                    </select>
                    <p><input type="submit" onclick="message()"></p>
                </fieldset>
            </form> -->
            <?= $lang['regform'] ?>
        </div>
        <div>
            <a class="link" href="login.php"><?= $lang['loginbtn'] ?></a>
        </div>
        <div class="list">
            <div class="container">
                <?= $lang['recomendations'] ?>
            </div>
        </div>
        <div>
            <a target="_blank" href="https://www.facebook.com" class="fa fa-facebook"></a>
            <a target="_blank" href="https://twitter.com/?lang=ru" class="fa fa-twitter"></a>
            <a target="_blank" href="https://www.google.com.ua/?hl=ru" class="fa fa-google"></a>
            <a target="_blank" href="https://www.youtube.com" class="fa fa-youtube"></a>
            <a target="_blank" href="https://www.instagram.com/?hl=ru" class="fa fa-instagram"></a>
            <a target="_blank" href="https://www.pinterest.com" class="fa fa-pinterest"></a>
        </div>
        <div id="minfin-informer-m1Fn-currency" class="informer">
            <?= $lang['informer'] ?>
        </div>
        <script>
            
        </script>
    </div>
    <div class="weather">
        <a target="_blank" href="https://nochi.com/weather/kiev-18881"><img src="https://w.bookcdn.com/weather/picture/32_18881_1_20_34495e_250_2c3e50_ffffff_ffffff_1_2071c9_ffffff_0_6.png?scode=124&domid=604&anc_id=1337" alt="booked.net" /></a>
    </div>
    <div class="cloak">
        <script type="text/javascript">
            var css_file = document.createElement("link");
            css_file.setAttribute("rel", "stylesheet");
            css_file.setAttribute("type", "text/css");
            css_file.setAttribute("href", "//s.bookcdn.com//css/cl/bw-cl-120x45.css");
            document.getElementsByTagName("head")[0].appendChild(css_file);
        </script>
        <div id="tw_6_1246519141">
            <div style="width:130px; height:45px; margin: 0 auto;">
                <a href="https://nochi.com/time/kiev-18881">Киев</a><br />
            </div>
        </div>
        <script type="text/javascript">
            function setWidgetData_1246519141(data) {
                if (typeof(data) != 'undefined' && data.results.length > 0) {
                    for (var i = 0; i < data.results.length; ++i) {
                        var objMainBlock = '';
                        var params = data.results[i];
                        objMainBlock = document.getElementById('tw_' + params.widget_type + '_' + params.widget_id);
                        if (objMainBlock !== null) objMainBlock.innerHTML = params.html_code;
                    }
                }
            }
            var clock_timer_1246519141 = -1;
        </script>
        <script type="text/javascript" charset="UTF-8" src="https://widgets.booked.net/time/info?ver=2&domid=589&type=6&id=1246519141&scode=124&city_id=18881&wlangid=20&mode=1&details=0&background=ffffff&color=333333&add_background=a0a1a1&add_color=000000&head_color=333333&border=0&transparent=0">
        </script>
    </div>
</body>

</html>