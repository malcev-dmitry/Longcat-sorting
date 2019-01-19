<?php
    echo'<html>
            <head>
                <title>Добавление</title>
                <meta charset="utf-8">
                <link rel="stylesheet" href="css/style.css"/>
            </head>
            <body>
        	   <div class="st">';
    $db_host='localhost';
    $db_name='statistica';
    $db_username='Your_Name';
    $db_password='Your_Password';
    $mysqli = new mysqli($db_host,$db_username,$db_password,$db_name);
    $mysqli->set_charset('utf8'); 
    if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }
    $p_id = (int)$_GET['id'];
    if ($p_id == 0){
    	echo'<form action="add.php?id=0" method="POST">
                <tr>
                    <td>Название страны:</td>
                    <td><input type="text" name="new_contry"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="OK"></td>
                </tr>
            </form><div class="st">';
        $results = $mysqli->query("SELECT contry.name_contry AS contry, contry.id_contry AS id_contry FROM `contry`");
        while($row = $results->fetch_assoc()) {
        	print '<br>'.$row["contry"].' - <a href="delete.php?id=0&del='.$row["id_contry"].'">Удалить</a><br></br>';
        }
        echo '<br><a href = "index.php">Вернуться на главную</a></br>';
    }
    if ($p_id == 1){
        $results = $mysqli->query("SELECT medal.medal_name AS medal_name, medal.id_medal AS id_medal FROM `medal`");
        echo'<br>Добавление медали</br>
            <form action="add.php?id=1" method="POST">
                <p><select size="2" name="medal">
                    <option disabled>Выберите тип медали</option>';
        while($row = $results->fetch_assoc()) {
            print'<option value='.$row["id_medal"].'>'.$row["medal_name"].'</option>';
        }
        echo'</select>
            <select size="2" name="contry">
                <option disabled>Выберите страну</option>';
        $results = $mysqli->query("SELECT contry.name_contry AS name_contry, contry.id_contry AS id_contry FROM `contry`");
        while($row = $results->fetch_assoc()) {
            print'<option value='.$row["id_contry"].'>'.$row["name_contry"].'</option>';
        }
        echo'</select>
            <select size="2" name="sport">
                <option disabled>Выберите вид спорта</option>';
        $results = $mysqli->query("SELECT sport.sport_name AS sport_name, sport.id_sport AS id_sport FROM `sport`");
        while($row = $results->fetch_assoc()) {
            print'<option value='.$row["id_sport"].'>'.$row["sport_name"].'</option>';
        }
        echo'</select>
            <p><select size="2" name="fio0">
                <option disabled>Выберите ФИО обязательно</option>';
        $results = $mysqli->query("SELECT fio.fio_name AS fio_name, fio.id_fio AS id_fio FROM `fio`");
        while($row = $results->fetch_assoc()) {
            print'<option value='.$row["id_fio"].'>'.$row["fio_name"].'</option>';
        }
        echo'</select>
            <select size="2" name="fio1">
                <option disabled>Выберите ФИО</option>';
        $results = $mysqli->query("SELECT fio.fio_name AS fio_name, fio.id_fio AS id_fio FROM `fio`");
        while($row = $results->fetch_assoc()) {
            print'<option value='.$row["id_fio"].'>'.$row["fio_name"].'</option>';
        }
        echo'</select>
            <select size="2" name="fio2">
                <option disabled>Выберите ФИО</option>';
        $results = $mysqli->query("SELECT fio.fio_name AS fio_name, fio.id_fio AS id_fio FROM `fio`");
        while($row = $results->fetch_assoc()) {
            print'<option value='.$row["id_fio"].'>'.$row["fio_name"].'</option>';
        }
        echo'</select>
            <select size="2" name="fio3">
                <option disabled>Выберите ФИО</option>';
        $results = $mysqli->query("SELECT fio.fio_name AS fio_name, fio.id_fio AS id_fio FROM `fio`");
        while($row = $results->fetch_assoc()) {
            print'<option value='.$row["id_fio"].'>'.$row["fio_name"].'</option>';
        }
        echo'</select>
            <select size="2" name="fio4">
                <option disabled>Выберите ФИО</option>';
        $results = $mysqli->query("SELECT fio.fio_name AS fio_name, fio.id_fio AS id_fio FROM `fio`");
        while($row = $results->fetch_assoc()) {
            print'<option value='.$row["id_fio"].'>'.$row["fio_name"].'</option>';
        }
        echo'</select>
            <p><input type="submit" value="Ок"></p>
        </form>';
        $results = $mysqli->query("SELECT svazi.id_svazi AS id_svazi, contry.name_contry AS con, fio.fio_name AS fio, svazi.svazi_fio AS name5, sport.sport_name AS sport, medal.medal_name AS med FROM fio, sport, svazi, contry, medal WHERE ((fio.id_fio = svazi.svazi_fio AND svazi.svazi_contry = contry.id_contry AND sport.id_sport = svazi.svazi_sport AND medal.id_medal = svazi.bronza_medal) OR (fio.id_fio = svazi.svazi_fio AND svazi.svazi_contry = contry.id_contry AND sport.id_sport = svazi.svazi_sport AND medal.id_medal = svazi.serebro_medal) OR (fio.id_fio = svazi.svazi_fio AND svazi.svazi_contry = contry.id_contry AND sport.id_sport = svazi.svazi_sport AND medal.id_medal = svazi.zoloto_medal))");
        echo'<table align="center" width="90%" border="1px" id="myTable" class="tablesorter">
                <tbody>
                    <thead>
                        <tr>
                            <th>№</th>
                            <th>Тип медали</th>
                            <th>Страна</th>
                            <th>Вид спорта</th>
                            <th>ФИО</th>
                            <th class="st"></th>
                        </tr>
                    </thead>';
        $idn = 1;
        while($row = $results->fetch_assoc()) {
            $p_name5 = explode(" ", $row["name5"]);
            $coun = count($p_name5);
            $p_name = "";
            for ($i=1; $i < $coun; $i++){
                $result = $mysqli->query("SELECT fio.fio_name AS name FROM `fio` WHERE fio.id_fio = $p_name5[$i]");
                $row1 = $result->fetch_assoc();
                $p_name = $p_name.", ".$row1["name"];
                $result->free();
            }
            print '<tr>';
            print '<th>'.$idn.'</th>';
            print '<th>'.$row["med"].'</th>';
            print '<th>'.$row["con"].'</th>';
            print '<th>'.$row["sport"].'</th>';
            print '<th>'.$row["fio"].$p_name.'</th>';
            print '<th class="right"><a href="delete.php?id=1&del='.$row["id_svazi"].'">&nbsp&nbspУдалить</a></th>';
            print '</tr>';
            $idn++;
        }
        $results->free();
        echo'</tbody>
        </table>
        <br><a href = "index.php">Вернуться на главную</a></br>';
    }
    if ($p_id == 2){
        echo'<form action="add.php?id=2" method="POST">
                <tr>
                    <td>Название вида спорта:</td>
                    <td><input type="text" name="new_sport"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="OK"></td>
                </tr>
            </form>
            <div class="st">';
        $results = $mysqli->query("SELECT sport.sport_name AS sport, sport.id_sport AS id_sport FROM `sport`");
        while($row = $results->fetch_assoc())
            print '<br>'.$row["sport"].' - <a href="delete.php?id=2&del='.$row["id_sport"].'">Удалить</a><br></br>';
        echo '<br><a href = "index.php">Вернуться на главную</a></br>';
    }
    if ($p_id == 3){
        echo'<form action="add.php?id=3" method="POST">
                <tr>
                    <td>ФИО спортсмена:</td>
                    <td><input type="text" name="new_fio"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="OK"></td>
                </tr>
            </form><div class="st">';
        $results = $mysqli->query("SELECT fio.fio_name AS fio, fio.id_fio AS id_fio FROM `fio`");
        while($row = $results->fetch_assoc())
            print '<br>'.$row["fio"].' - <a href="delete.php?id=3&del='.$row["id_fio"].'">Удалить</a><br></br>';
        echo '<br><a href = "index.php">Вернуться на главную</a></br>';
    }
    $mysqli->close();
    echo'           </div>
                </tbody>
            </div>	
        </body>
    </html>';
?>
