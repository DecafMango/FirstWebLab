<?php
    // Функция, возвращающая четверть, в которую попала точка на координатной плоскости
    function get_area($x, $y) {
        if ($x > 0 && $y > 0)
            return 1;
        else if ($x <= 0 && $y >= 0)
            return 2;
        else if ($x <= 0 && $y < 0)
            return 3;
        else
            return 4;
    }

    /*
     * Функция, возвращающая результат попадания точки в область
     *
     * Логика работы:
     * --> Четверть 1: в текущей реализации первая четверть подразумевает, что точка НЕ ЛЕЖИТ на осях координат, так что
     * по рисунку видно, что точка точно не попадает в область
     * --> Четверть 2: в текущей реализации вторая четверть подразумевает, что точка МОЖЕТ ЛЕЖАТЬ на осях координат
     * (причем на обеих, так как прямоугольник занимает больше места)
     * --> Четверть 3: в текущей реализации третья четверть подразумевает, что точка МОЖЕТ ЛЕЖАТЬ ТОЛЬКО
     *  на оси ординат (т.к. вертикальный катет треугольника больше по длине, чем радиус круга),
     * в первую очередь проверяется значение x, а затем при помощи функции прямой (y = -2x - r) вычисляется, что
     * y попадает в верхнюю область, включая прямую (гипотенузу треугольника)
     * --> Четверть 4: обычная проверка на попадание в круг при помощи формулы окружности x^2 + y^2 = r^2
    */
    function check_hit($x, $y, $r) {
        $area = get_area($x, $y);

        switch ($area) {
            case 1:
                return false;
            case 2:
                return ($x >= -$r && $y <= $r / 2);
            case 3:
                return ($x > -($r / 2) && $y >= (-2 * $x - $r));
            case 4:
                return (pow($x, 2) + pow($y, 2) <= pow($r, 2));
        }
    }

    // Функция для записи попытки в базу данных
    function save_attempt($x, $y, $r, $posted_date, $posted_time, $is_hit) {
        $connect_string = "host=localhost port=5433 dbname=WebDatabase password=qwerty123";
        $db_connect = pg_connect($connect_string);
        $query =
            "INSERT INTO results (x, y, r, posted_date, posted_time, is_hit)
            VALUES ($x, $y, $r, '$posted_date', '$posted_time', $is_hit)";
        pg_query($db_connect, $query);
        pg_close($db_connect);
    }

    // Функция для записи попытки в файл results.txt
//    function save_attempt_file($x, $y, $r, $posted_date, $posted_time, $is_hit) {
//        $file = fopen("results.txt", "a");
//        $row = $x . ";" . $y . ";" . $r . ";" . $posted_date . ";" . $posted_time . ";" . $is_hit . "\n";
//        fwrite($file, $row);
//        fclose($file);
//    }

    // Проверка на то, что переданы все нужные ключи
    if (!array_key_exists("x", $_POST) || !array_key_exists("y", $_POST) || !array_key_exists("r", $_POST)) {
        http_response_code(400);
        header("Location: index.php");
        exit;
    }

    $x = intval($_POST["x"]);
    $y = floatval($_POST["y"]);
    $r = intval($_POST["r"]);
    $posted_date = date("Y-m-d");
    $posted_time = date("H:i:s");


    $is_hit = check_hit($x, $y, $r) ? 1 : 0;
    save_attempt($x, $y, $r, $posted_date, $posted_time, $is_hit);
    http_response_code(200);
    exit;