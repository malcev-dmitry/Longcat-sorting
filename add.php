<?php
    $db_host='localhost';
    $db_name='statistica';
    $db_username='Your_Name';
    $db_password='Your_Password';
    $mysqli = new mysqli($db_host,$db_username,$db_password,$db_name);
    $mysqli->set_charset('utf8'); 
    if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }
    if ($_GET['id'] == 0){
        if ($_POST['new_contry']!=""){
            $mysqli->query("INSERT INTO `contry` (`name_contry`) VALUES ('".$_POST['new_contry']."');");
            echo'<script>window.location.href="view_add.php?id=0";</script>';
        }
        else{
            echo '<br>Поле должно быть заполнено</br>';
            print '<br><a href="view_add.php?id=0"> Назад </a></br>';
        }
    }
    if ($_GET['id'] == 1){
        if (($_POST['medal']!="") and ($_POST['contry']!="") and ($_POST['sport']!="") and ($_POST['fio0']!="")){
            $p_fio = $_POST['fio0'];
            if (($_POST['fio1'] != "") and ($_POST['fio0'] != $_POST['fio1']))
                $p_fio = $p_fio." ".$_POST['fio1'];
            if (($_POST['fio2'] != "") and ($_POST['fio2'] != $_POST['fio0']) and ($_POST['fio2'] != $_POST['fio1']))
                $p_fio = $p_fio." ".$_POST['fio2'];
            if (($_POST['fio3'] != "") and ($_POST['fio3'] != $_POST['fio0']) and ($_POST['fio3'] != $_POST['fio1']) and ($_POST['fio3'] != $_POST['fio2']))
                $p_fio = $p_fio." ".$_POST['fio3'];
            if (($_POST['fio4'] != "") and ($_POST['fio4'] != $_POST['fio0']) and ($_POST['fio4'] != $_POST['fio1']) and ($_POST['fio4'] != $_POST['fio2']) 
            and ($_POST['fio4'] != $_POST['fio3']))
                $p_fio = $p_fio." ".$_POST['fio4'];
            if ($_POST['medal'] == 1)
                $mysqli->query("INSERT INTO `svazi` (`svazi_contry`, `svazi_fio`, `svazi_sport`, `zoloto_medal`) VALUES ('".$_POST['contry']."', '".$p_fio."', '".$_POST['sport']."', '".$_POST['medal']."')");
            header("Location: ".$_SERVER['HTTP_REFERER']);
            if ($_POST['medal'] == 2)
                $mysqli->query("INSERT INTO `svazi` (`svazi_contry`, `svazi_fio`, `svazi_sport`, `serebro_medal`) VALUES ('".$_POST['contry']."', '".$p_fio."', '".$_POST['sport']."', '".$_POST['medal']."')");
            header("Location: ".$_SERVER['HTTP_REFERER']);
            if ($_POST['medal'] == 3)
                $mysqli->query("INSERT INTO `svazi` (`svazi_contry`, `svazi_fio`, `svazi_sport`, `bronza_medal`) VALUES ('".$_POST['contry']."', '".$p_fio."', '".$_POST['sport']."', '".$_POST['medal']."')");
            echo'<script>window.location.href="view_add.php?id=1";</script>';
        }
        else{
            echo '<br>Поля должны быть заполнены</br>';
            print '<br><a href="view_add.php?id=1"> Назад </a></br>';
        }
    }
    if ($_GET['id'] == 2){
        if ($_POST['new_sport']!=""){
            $mysqli->query("INSERT INTO `sport` (`sport_name`) VALUES ('".$_POST['new_sport']."');");
            echo'<script>window.location.href="view_add.php?id=2";</script>';
        }
        else{
            echo '<br>Поле должно быть заполнено</br>';
            print '<br><a href="view_add.php?id=2"> Назад </a></br>';
        }
    }
    if ($_GET['id'] == 3){
        if ($_POST['new_fio']!=""){
                $mysqli->query("INSERT INTO `fio` (`fio_name`) VALUES ('".$_POST['new_fio']."');");
                echo'<script>window.location.href="view_add.php?id=3";</script>';
        }
        else{
            echo '<br>Поле должно быть заполнено</br>';
            print '<br><a href="view_add.php?id=3"> Назад </a></br>';
        }
    }
    $mysqli->close();
?>
