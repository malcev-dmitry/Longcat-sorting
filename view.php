<?php
	echo'<html>
			<head>
				<meta charset="utf-8">
				<title>Статистика</title>
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
	$p_con = (int)$_GET['id_contry'];
	$p_med = (int)$_GET['id_med'];
	if ($p_med != 4){
		$results = $mysqli->query("SELECT contry.name_contry AS contry, medal.medal_name AS med FROM `contry`,`medal` WHERE (contry.id_contry = $p_con AND medal.id_medal = $p_med)");
		$row = $results->fetch_assoc();
		echo '<tr>'.$row["med"].' медали cтраны '.$row["contry"].'</tr>';
		$results->free();
		if ($p_med == 1)
			$results = $mysqli->query("SELECT contry.name_contry AS con, fio.fio_name AS fio, svazi.svazi_fio AS name5, sport.sport_name AS sport, medal.medal_name AS med FROM fio, sport, svazi, contry, medal WHERE (fio.id_fio = svazi.svazi_fio AND svazi.svazi_contry = $p_con AND svazi.svazi_contry = contry.id_contry AND svazi.zoloto_medal = $p_med AND sport.id_sport = svazi.svazi_sport AND medal.id_medal = svazi.zoloto_medal)");
		else
			if ($p_med == 2) 
				$results = $mysqli->query("SELECT contry.name_contry AS con, fio.fio_name AS fio, svazi.svazi_fio AS name5, sport.sport_name AS sport, medal.medal_name AS med FROM fio, sport, svazi, contry, medal WHERE (fio.id_fio = svazi.svazi_fio AND svazi.svazi_contry = $p_con AND svazi.svazi_contry = contry.id_contry AND svazi.serebro_medal = $p_med AND sport.id_sport = svazi.svazi_sport AND medal.id_medal = svazi.serebro_medal)");
			else
				if ($p_med == 3)
					$results = $mysqli->query("SELECT contry.name_contry AS con, fio.fio_name AS fio, svazi.svazi_fio AS name5, sport.sport_name AS sport, medal.medal_name AS med FROM fio, sport, svazi, contry, medal WHERE (fio.id_fio = svazi.svazi_fio AND svazi.svazi_contry = $p_con AND svazi.svazi_contry = contry.id_contry AND svazi.bronza_medal = $p_med AND sport.id_sport = svazi.svazi_sport AND medal.id_medal = svazi.bronza_medal)");
	}
	else{
		$results = $mysqli->query("SELECT contry.name_contry AS contry FROM `contry` WHERE contry.id_contry = $p_con");
		$row = $results->fetch_assoc();
		echo '<tr> Все медали cтраны '.$row["contry"].'</tr>';
		$results->free();
		$results = $mysqli->query("SELECT contry.name_contry AS con, fio.fio_name AS fio, svazi.svazi_fio AS name5, sport.sport_name AS sport, medal.medal_name AS med FROM fio, sport, svazi, contry, medal WHERE ((fio.id_fio = svazi.svazi_fio AND svazi.svazi_contry = $p_con AND svazi.svazi_contry = contry.id_contry AND sport.id_sport = svazi.svazi_sport AND medal.id_medal = svazi.bronza_medal) OR (fio.id_fio = svazi.svazi_fio AND svazi.svazi_contry = $p_con AND svazi.svazi_contry = contry.id_contry AND sport.id_sport = svazi.svazi_sport AND medal.id_medal = svazi.serebro_medal) OR (fio.id_fio = svazi.svazi_fio AND svazi.svazi_contry = $p_con AND svazi.svazi_contry = contry.id_contry AND sport.id_sport = svazi.svazi_sport AND medal.id_medal = svazi.zoloto_medal))");	
	}
	echo'<table align="center" width="90%" border="1px" id="myTable" class="tablesorter">	
			<thead>
				<tr>
					<th>№</th>
					<th>ФИО</th>
					<th>Вид спорта</th>
					<th>Тип медали</th>
				</tr>
			</thead>
			<tbody>';
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
			    print '<th>'.$row["fio"].$p_name.'</th>';
			    print '<th>'.$row["sport"].'</th>';
			    print '<th>'.$row["med"].'</th>';
			    print '</tr>';
			    $idn++;
			}
			$results->free();
			$mysqli->close();
			echo'</tbody>
				</table>
			</div>	
		</body>
	</html>';
?>
