<?PHP
include "../controller/VoitureC.php";
include_once("navbar.php");

$voitureC = new VoitureC();
$listevoitures = $voitureC->affichervoiture();

?>

<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Afficher Liste Utilisateurs </title>
	<link rel="stylesheet" href="../views/include/front.css">
	<style>
		.mini_img {
			width: 300px;
			height: auto;
		}
	</style>

</head>

<body>
	<hr>
	<center>
		<table border=1 align='center' class="content-table">
	</center>
	<tr>
		<th>marque</th>
		<th>prix</th>
		<th>image</th>
		<th>reserver</th>
	</tr>

	<?PHP
	foreach ($listevoitures as $voiture) {
	?>
		<tr>
			<td><?PHP echo $voiture['Marque']; ?></td>
			<td><?PHP echo $voiture['Prix']; ?></td>
			<td><img src="include/<?PHP echo $voiture['Image']; ?>" alt="image" class="mini_img"></td>
			<td> <button><a href="../views/ajouterreservation.php">reserver </a></button></td>
		</tr>
	<?PHP
	}
	?>
	</table>
</body>

</html>