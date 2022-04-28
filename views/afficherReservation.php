<?PHP
	include "../controller/ReserverC.php";

	$reserverC=new ReserverC();
	$listeReservation=$reserverC->afficherreservation();

?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Afficher Liste Utilisateurs </title>
    </head>
    <body>
		<button><a href="ajouterreservation.php">Ajouter un Utilisateur</a></button>
		<hr>
		<table border=1 align = 'center'>
			<tr>
				<th>Id</th>
				<th>date_permis</th>
				<th>Date_debut</th>
				<th>date_retour</th>
				<th>ville</th>
				<th>supprimer</th>
				<th>modifier</th>
			</tr>

			<?PHP
				foreach($listeReservation as $reservation){
			?>
				<tr>
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
