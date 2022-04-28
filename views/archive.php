<?php include("header.php");
include("navbar1.php");
include("sidebar.php");


$reclamationsc=new reclamationsc();//appel au controlleur
$listereclamations=$reclamationsc->afficher_reclamations();
 
?>
<html>
<style>
            #rec
            {
				position: relative;
				top: 50px; left: 500px;
              color : black;
			  width: 700px;
   			 height: 350px;
            }
			#btn{
				position: relative;
				top: 600px; left: 250px;
				width: 100px;
   				 height: 50px;
			}
        </style>

<div class="m-n2">
  <button id="btn" class="btn btn-primary m-2" onclick="location.href='afficherreclamations.php'"link><span>retour</span></button>
</div>
		<div>
		<table border="1" align="center" id="rec" class="table table-responsive">
			<tr>
				<th scope="col">num de reclamation</th>
				<th scope="col">sujet</th>
				<th scope="col">date reclamation</th>
				<th scope="col">etat</th>
				<th scope="col">id client</th>

			</tr>
			<?php
				foreach($listereclamations as $reclamations){
					if($reclamations['etat']==3){
			?>
			<tr onclick="get()">
				<td scope="row" ><?php echo $reclamations['num_reclamation']; ?></td>
				<td ><?php echo $reclamations['sujet']; ?></td>
				<td><?php echo $reclamations['date_reclamation']; ?></td>
				<td ><?php echo $reclamations['etat']; ?></td>
				<td ><?php echo $reclamations['id_client']; ?></td>
				<?php
				if($reclamations['etat'] == 0){
			?>
			<td ><button class="btn btn-square btn-primary m-2"><i class="fa fa-envelope"></i></button>        </td>

			<?php
				}
			?>
			<?php
				if($reclamations['etat'] == 1){
			?>
			<td > <button class="btn btn-square btn-primary m-2"><i class="fa fa-envelope-open"></i></button>       </td>
			
			<?php
				}
			?>

			</tr>
			<script>
    
	var t = document.getElementById('rec');
	
	for(var i = 0; i < t.rows.length; i++)
	{
		t.rows[i].onclick = function()
		{
			currentnum = this.cells[0].innerHTML;	
			
			document.cookie = 'currentnum='+currentnum+'; path=/';
			window.location.href='consulteruserreclamation.php';



                                   
                                

		   	
		};
	}


</script>
			<?php
				}}
			?>


		</table>
		</div>

</html>







