<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <title>AAA Capital</title>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $.datepicker.regional['ru'] = {
            closeText: 'Закрыть',
            prevText: 'Предыдущий',
            nextText: 'Следующий',
            currentText: 'Сегодня',
            monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
            monthNamesShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
            dayNames: ['воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'],
            dayNamesShort: ['вск', 'пнд', 'втр', 'срд', 'чтв', 'птн', 'сбт'],
            dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
            weekHeader: 'Не',
            dateFormat: 'dd.mm.yy',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        };
        $.datepicker.setDefaults($.datepicker.regional['ru']);
    </script>
</head>

<body>
    <?php
    require_once 'connection.php';

    if (isset($_POST['filename']) && isset($_POST['phone'])) {

        $link = mysqli_connect($host, $user, $password, $database)
            or die("Ошибка " . mysqli_error($link));


        $filename = htmlentities(mysqli_real_escape_string($link, $_POST['filename']));
        $place = htmlentities(mysqli_real_escape_string($link, $_POST['place']));
        $date = htmlentities(mysqli_real_escape_string($link, $_POST['date']));

        $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
        $surname = htmlentities(mysqli_real_escape_string($link, $_POST['surname']));
        $phone = htmlentities(mysqli_real_escape_string($link, $_POST['phone']));


        $query = "SELECT id FROM photographer WHERE phone = '$phone'";
        $photographerid = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        while ($row = mysqli_fetch_array($photographerid)) {
            $id = $row['id'];
        }

        $query = "INSERT INTO user VALUES(NULL, '$login', '$password', '$email', '$phone')";

        // выполняем запрос
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        if ($result) {
            echo "<span style='color:blue;'>Данные добавлены</span>";
        }
        // закрываем подключение
        mysqli_close($link);
    }
    ?>
    <h2>Дoдати нову фотографію</h2>
    <form method="POST">
        <p>Назва файлу:<br>
            <input type="text" name="filename" /></p>
        <p>Місце: <br>
            <input type="text" name="place" /></p>
        <p>Дата: <br>
            <input type="date" name="date">
        </p>
        <p>Ім'я фотографа:<br>
            <input type="text" name="name" /></p>
        <p>Прізвище фотографа: <br>
            <input type="text" name="surname" /></p>
        <p>Номер телефону фотографа: <br>
            <input type="number" name="phone" /></p>
        <input type="submit" value="Добавить">
    </form>
</body>

</html>