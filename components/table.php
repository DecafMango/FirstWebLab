<button class="return-button">Обратно на главную</button>
<table class="result-table">
    <tr>
        <th>X</th>
        <th>Y</th>
        <th>R</th>
        <th>Дата</th>
        <th>Время</th>
        <th>Попадание</th>
    </tr>
    <?php

    function exception_error_handler($errno, $errstr, $errfile, $errline)
    {
        throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
    }

    set_error_handler("exception_error_handler");

    function get_data()
    {
        try {
            $connect_string = "host=localhost port=5433 dbname=WebDatabase";
            $db_connect = @pg_connect($connect_string);
            $query = "select * from results order by posted_date desc, posted_time desc";
            $query_result = pg_query($db_connect, $query);
            return pg_fetch_all($query_result);
        } catch (Exception $e) {
            echo "<h2 class=\"error-text\">На данный момент сервер не способен обработать ваш запрос</h2>";
            return null;
        }
    }

    $data = get_data();

    if ($data != null) {

        foreach ($data as $index => $row) {
            $x = $row["x"];
            $y = $row["y"];
            $r = $row["r"];
            $posted_date = $row["posted_date"];
            $posted_time = $row["posted_time"];
            $is_hit = $row["is_hit"] == "1" ? "Попал" : "Не попал";
            echo
            "
                <tr>
                    <td>$x</td>  
                    <td>$y</td>  
                    <td>$r</td>  
                    <td>$posted_date</td>  
                    <td>$posted_time</td>  
                    <td>$is_hit</td>  
                </tr>
            ";
        }
    }
    ?>
</table>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="scripts/return_button_script.js"></script>
<?php
