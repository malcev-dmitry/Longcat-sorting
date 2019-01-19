<?php 
	echo'<html>
			<head>
				<title>Статистика</title>
				<meta charset="utf-8">
				<link rel="stylesheet" href="css/style.css"/>
			</head>
			<body>
				<div class="st">	
					<tr>Статистика олимпийских игр</tr>
						<table align="center" width="90%" border="1px" id="myTable" class="tablesorter">';
	$db_host='localhost';
	$db_name='statistica';
	$db_username='Your_Name';
    	$db_password='Your_Password';
	if(!$_GET['key'])
		$key = "zoloto DESC, serebro DESC, bronza DESC";
	else
		if($_GET['met'] == 1){
			$key = $_GET['key'];
			$met = 0;
		}
		else{
			$key = $_GET['key'] . " DESC";
			$met = 1;
		}
	echo'
		<thead>
			<tr>
				<th><a href="index.php?key=place&met='.$met.'">Место</a></th>
				<th><a href="index.php?key=contry&met='.$met.'">Страна</a></th>
				<th><a href="index.php?key=zoloto&met='.$met.'">Золото</a></th>
				<th><a href="index.php?key=serebro&met='.$met.'">Серебро</a></th>
				<th><a href="index.php?key=bronza&met='.$met.'">Бронза</a></th>
				<th><a href="index.php?key=summa&met='.$met.'">Всего</a></th>
			</tr>
		</thead>';
	$mysqli = new mysqli($db_host,$db_username,$db_password,$db_name);
	$mysqli->set_charset('utf8'); 
	if ($mysqli->connect_error) {
	    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}
	$results = $mysqli->query("SELECT * FROM (SELECT *, @i := @i + 1 AS place FROM (SELECT contry.name_contry AS contry, contry.id_contry AS id_contry, COUNT(svazi.zoloto_medal) AS zoloto, COUNT(svazi.serebro_medal) AS serebro, COUNT(svazi.bronza_medal) AS bronza, (COUNT(svazi.zoloto_medal) + COUNT(svazi.serebro_medal) + COUNT(svazi.bronza_medal)) AS summa FROM `contry`,`svazi` WHERE contry.id_contry = svazi.svazi_contry GROUP BY contry.name_contry ORDER BY zoloto DESC, serebro DESC, bronza DESC) AS z, (select @i:=0) AS q) AS w ORDER BY $key");
	while($row = $results->fetch_assoc()) {
	    print '<tr>';
	    print '<th>'.$row["place"].'</th>';
	    print '<th>'.$row["contry"].'</th>';
	    print '<th><a href = "view.php?id_contry='. $row["id_contry"] .'&id_med=1">'. $row["zoloto"] .'</a></th>';
	    print '<th><a href = "view.php?id_contry='. $row["id_contry"] .'&id_med=2">'. $row["serebro"] .'</a></th>';
	    print '<th><a href = "view.php?id_contry='. $row["id_contry"] .'&id_med=3">'. $row["bronza"] .'</a></th>';
	    print '<th><a href = "view.php?id_contry='. $row["id_contry"] .'&id_med=4">'. $row["summa"] .'</a></th>';
	    print '</tr>';
	}
	$results->free();
	$mysqli->close();
	echo'		</table>
				<br><a href = "view_add.php?id=0">Добавить страну</a></br>
				<br><a href = "view_add.php?id=1">Добавить медаль</a></br>
				<br><a href = "view_add.php?id=2">Добавить вид спорта</a></br>
				<br><a href = "view_add.php?id=3">Добавить спортсмена</a></br>
			</div>
		</body>
	</html>';
?>
