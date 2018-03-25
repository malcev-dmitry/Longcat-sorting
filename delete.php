<?php
    echo'<meta charset="utf-8">';
    $db_host='localhost';
    $db_name='statistica';
    $db_username='root';
    $db_password='root';
    $mysqli = new mysqli($db_host,$db_username,$db_password,$db_name);
    if (isset($_GET['del'])) {
        if ($_GET['id'] == 0){
            $results = $mysqli->query('DELETE FROM contry WHERE contry.id_contry = "'.$_GET['del'].'"');
            if ($results) {
        		$mysqli->close();
        		echo'<script>window.location.href="view_add.php?id=0";</script>';
            } 
            else {
        		echo'<br>Не удалось удалить элемент из таблицы "Страны", т.к. он связан с элементами таблицы "Добавить медаль".</br> 
                    <br>Удалите все записи из таблицы "Добавить медаль" в которых присутствует элемент таблицы "Страны".</br>';
                $mysqli->close();
                print '<br><a href="view_add.php?id=0"> Назад </a></br>';
            }
        }
        if ($_GET['id'] == 1){
            $results = $mysqli->query('DELETE FROM svazi WHERE svazi.id_svazi = "'.$_GET['del'].'"');
            if ($results) {
                $mysqli->close();
        		echo'<script>window.location.href="view_add.php?id=1";</script>';
            }
        }
        if ($_GET['id'] == 2){
            $results = $mysqli->query('DELETE FROM sport WHERE sport.id_sport = "'.$_GET['del'].'"');
            if ($results) {
                $mysqli->close();
        		echo'<script>window.location.href="view_add.php?id=2";</script>';
            }else {
                echo'<br>Не удалось удалить элемент из таблицы "Виды спорта", т.к. он связан с элементами таблицы "добавить медаль".</br> 
                <br>Удалите все записи из таблицы "Добавить медаль" в которых присутствует элемент таблицы "Виды спорта".</br>';
                $mysqli->close();
                print'<br><a href="view_add.php?id=2"> Назад </a></br>';
            }
        }
        if ($_GET['id'] == 3){
            $results = $mysqli->query("SELECT svazi.svazi_fio AS name5 FROM `svazi`");
            $log = false;
            while($row = $results->fetch_assoc()) {
                $p_name5 = explode(" ", $row["name5"]);
                $coun = count($p_name5);
                for ($i=0; $i < $coun; $i++){
                    if ($p_name5[$i] == $_GET['del']){
                        $log = true;
                    }
                }
            }
            if ($log == true){
                echo'<br>Не удалось удалить элемент из таблицы "ФИО спортсмена", т.к. он связан с элементами таблицы "добавить медаль".</br> 
                <br>Удалите все записи из таблицы "Добавить медаль" в которых присутствует элемент таблицы "ФИО спортсмена".</br>';
                print'<br><a href="view_add.php?id=3">Назад</a></br>';
            }
            else{
                $results = $mysqli->query('DELETE FROM fio WHERE fio.id_fio = "'.$_GET['del'].'"');
                $mysqli->close();
                echo'<script>window.location.href="view_add.php?id=3";</script>';
            }
        }
    }
?>