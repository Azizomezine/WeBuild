<?PHP
	include "../controller/ReserverC.php";
	$reserverC=new ReserverC();
	$listeReservation=$reserverC->afficherreservation();	
?>

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                

              
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
				<th scope="col">identifiant du voiture</th>
                <th scope="col">numero reservation</th>
				<th scope="col">date permis</th>
				<th scope="col">Date debut</th>
				<th scope="col">date retour</th>
				<th scope="col">ville</th>
                <th scope="col">prix</th>
				<th scope="col">supprimer la reservation</th>
			
                                </tr>
                            </thead>
                            <tbody>
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
                    <td> <?php

$dateDifference = abs(strtotime($reservation['Date_retour']) - strtotime($reservation['Date_debut']));

$years  = floor($dateDifference / (365 * 60 * 60 * 24));
$months = floor(($dateDifference - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
$days   = floor(($dateDifference - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 *24) / (60 * 60 * 24));
$totale = $years+366+$months*12+$days*30 ; 
echo (($totale)*5)." TND  "; ?></td>
					<td>
						<form method="POST" action="../views/supprimerreservationback.php">
						<input type="submit" name="supprimer" value="supprimer">
						<input type="hidden" value=<?PHP echo $reservation['Id']; ?> name="id">
						</form>
					</td>
					*
				</tr>
			<?PHP
				}
			?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->
       
                    
                                
                                
                              
                               
    

           
     


     
</body>

</html>