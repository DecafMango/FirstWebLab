<a href="../index.php">Обратно</a>
<table>
    <tr>
        <th>X</th>
        <th>Y</th>
        <th>R</th>
        <th>Дата</th>
        <th>Время</th>
        <th>Попадание</th>
    </tr>
    <?php
        function get_data() {
            $connect_string = "host=localhost port=5433 dbname=WebDatabase password=qwerty123";
            $db_connect = pg_connect($connect_string);
            $query = "select * from results";
            $query_result = pg_query($db_connect, $query);
            return pg_fetch_all($query_result);
        }

        $data = get_data();

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
    ?>
</table>
<?php
