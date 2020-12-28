<?php 
require_once 'sessionstart.php';
if (isset($_POST['login']) && isset($_POST['password'])) {

    $link = mysqli_connect($host, $user, $password, $database)
        or die("Ошибка " . mysqli_error($link));

    $login = htmlentities(mysqli_real_escape_string($link, $_POST['login']));
    $password = htmlentities(mysqli_real_escape_string($link, $_POST['password']));

    $query = mysqli_query($link, "SELECT * FROM user WHERE login = '$login'") or die("Ошибка " . mysqli_error($link));

    $rows = mysqli_num_rows($query);

    if ($rows == 0) {
        echo "<script>alert('Аккаунту с таким логіном не існує, пройдіть реєстрацію!')</script>";
    } else {
        $row = mysqli_fetch_row($query);
        if ($row[2] == $password) {
            $date_today = date("d.m.y");
            $today[1] = date("H:i:s");
            $file = 'log.txt';
            $current = file_get_contents($file);
            $current .= "$row[0], $row[1], $row[2], $today[1], $date_today \n";
            file_put_contents($file, $current);
            echo "<script>alert('Успіх!')</script>";
            echo "<script>location.href = 'profile.php?id=$row[0]'</script>";
            echo $_POST["login"].";".$_POST["password"];
            file_put_contents("ajax.txt", $_POST['login']. ";" .$_POST['password']);
        } else {
            echo "<script>alert('Пароль неправильний!')</script>";
        }
    }
}
?>