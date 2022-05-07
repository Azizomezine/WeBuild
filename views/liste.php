<?PHP
	include "../controller/ReserverC.php";
    include_once("navbar.php"); 

	$reserverC=new ReserverC();
	$listeReservation=$reserverC->afficherreservation();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reservation Display</title>
<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link type="text/css" rel="stylesheet" href="../views/include/front.css"/>

</head>

<body>
<center><h1>reserver voiture</h1></center>
		<center><table border=1 align = 'center' class="content-table"></center>
			<tr>
		     	<th>voiture numero </th>
				<th>numero reservation</th>
				<th>date permis</th>
				<th>Date debut</th>
				<th>date retour</th>
				<th>ville</th>
				<th>supprimer votre reservation</th>
				<th>modifier votre reservation</th>
			</tr>

			<?PHP
				foreach($listeReservation as $reservation){
			?>
				<tr>
				<td><?PHP echo $reservation['idVoiture']; ?></td>
					<td><?PHP echo $reservation['Id']; ?></td>
					<td><?PHP echo $reservation['Date_permis']; ?></td>
					<td><?PHP echo $reservation['Date_debut']; ?></td>
					<td><?PHP echo $reservation['Date_retour']; ?></td>
					<td><?PHP echo $reservation['Ville']; ?></td>
					<td>
						<form method="POST" action="supprimerReservation.php">
						<input type="submit" name="supprimer" value="supprimer">
						<input type="hidden" value=<?PHP echo $reservation['Id']; ?> name="id">
						</form>
					</td>
					<td>
						<a href="modifierReservation.php?id=<?PHP echo $reservation['Id']; ?>"> Modifier </a>
					</td>
				</tr>
			<?PHP
				}
			?>
		</table>
    </body>
</html>