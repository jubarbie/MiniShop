<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Farmeurs Chinoirs</title>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
	<div id="header" class="topmain">
	</div>
	<!--*****************************************************************************************************-->
	<div id="main">
		<h1>Administrator</h1>
		<br><br><br><br>
		<h2>Ajout d'articles</h2>
		<form action="data_manip.php" method="POST">
			<br>
			<h3>Nom de l'article:</h3><input type="text" name="name" value="">
			<br>
			<h3>Type de l'article:</h3><input type="text" name="type" value="">
			<br>
			<h3>Prix de l'article:</h3><input type="text" name="prix" value="">
			<br>
			<input type="submit" name="submit" value="Ajouter">
		</form>
		<br><br><br><br>
		<h2>Suppression d'articles</h2>
		<form action="data_manip.php" method="POST">
			<br>
			<h3>Nom de l'article:</h3><input type="text" name="name" value="">
			<br>
			<input type="submit" name="submit" value="Supprimer">
		</form>
		<br><br><br><br>
		<h2>Modifier le prix</h2>
		<form action="data_manip.php" method="POST">
			<br>
			<h3>Nom de l'article:</h3><input type="text" name="name" value="">
			<br>
			<h3>Prix de l'article:</h3><input type="text" name="prix" value="">
			<br>
			<input type="submit" name="submit" value="Setprix">
		</form>
		<br><br><br><br>
		<form action="data_manip.php" method="POST">
			<h3>Voir les articles:</h3>	
			<input type="submit" name="submit" value="Browse" target="browseframe">
		</form>
	</div>
</body></html>