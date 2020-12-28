<?php
require_once 'sessionstart.php';
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>AAA Capital</title>
    
    <script type="text/javascript" src="jquery-11.0.min.js"></script> 
</head>

<body>
    
    <div class="background">
        <header id="header">
            <div class="container">
                <div class="header_logo">AAA Capital</div>
            </div>
        </header>
        <h2 style="margin-left: 10px">Увійти в систему</h2>
        <form method="POST" style="margin-left: 10px" id="loginform" onsubmit="return f()">
            <p>Логін:<br>
                <input type="text" id="login" name="login" value="<?php echo (isset($_POST["login"])) ? $_POST["login"] : null; // Заполняем поле по умолчанию ?>" /></p>
            <p>Пароль: <br>
                <input type="text" id="password" name="password" value="<?php echo (isset($_POST["password"])) ? $_POST["password"] : null; ?>" /></p>
            <input type="submit" value="Увійти">
        </form>
    </div>
    <div id="logindata">Замени меня</div>
    <script>
        function f(){
            $.post('form.php', $('#loginform').serialize(), function(data){$("#logindata").html(data)})
            return false;
        }
    </script>
</body>

</html>