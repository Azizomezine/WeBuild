<?php include("header.php");
include("navbar.php");
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
  <button id="btn" class="btn btn-primary m-2" onclick="location.href='archive.php'"link><span>Archive</span></button>
</div>
		<div>
		<table border="1" align="center" id="rec" class="table table-responsive">
			<tr>
				<th scope="col">Num</th>
				<th scope="col">id</th>
				<th scope="col">subject</th>
				<th scope="col">date</th>
				<th scope="col">statu</th>

			</tr>
			<?php
				foreach($listereclamations as $reclamations){
			?>
			<tr onclick="get()">
				<td scope="row" onclick="location.href='consulteruserreclamation.php'"link><?php echo $reclamations['num']; ?></td>
				<td onclick="location.href='consulteruserreclamation.php'"link><?php echo $reclamations['id']; ?></td>
				<td onclick="location.href='consulteruserreclamation.php'"link><?php echo $reclamations['subject']; ?></td>
				<td onclick="location.href='consulteruserreclamation.php'"link><?php echo $reclamations['date']; ?></td>
				<?php
				if($reclamations['state'] == 0){
			?>
			<td onclick="location.href='consulteruserreclamation.php'"link><button class="btn btn-square btn-primary m-2"><i class="fa fa-envelope"></i></button>        </td>
			<?php
				}
			?>
			<?php
				if($reclamations['state'] == 1){
			?>
			<td onclick="location.href='consulteruserreclamation.php'"link> <button class="btn btn-square btn-primary m-2"><i class="fa fa-envelope-open"></i></button>       </td>
			
			<?php
				}
			?>
			</tr>
			<script>
    
	var t = document.getElementById('rec');
	
	for(var i = 1; i < t.rows.length; i++)
	{
		t.rows[i].onclick = function()
		{
			currentnum = this.cells[0].innerHTML;
			var src="consulteruserreclamation.php?num="+currentnum;
          window.location.href=src;

		   	
		};
	}

	consol.log(currentnum);


</script>
			<?php
				}
			?>


		</table>
		</div>

</html>







