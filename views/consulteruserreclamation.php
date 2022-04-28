
<?php 
include("header.php");
include("navbar1.php");
include("sidebar.php");

$user1=new reclamationsc();
$currentnum =intval($_COOKIE['currentnum']);
$user= $user1->recuperer_reclamations($currentnum);

?>

<style>
        #rec
            {
				position: relative;
				top: 50px; left: 500px;
              color : black;
			  width: 700px;
   			 height: 350px;
            }   
			#bt{
				
				top: 150px; left: 250px;
				width: 100px;
   				 height: 50px;
			}
        </style>
<html>
<style>
            #not
            {
              background-color: #545454;
              color : #E8EAED;
            }
        </style>
        
<div>
		<center><h1>reclamation</h1></center>
		<table border="1" align="center" id="rec" class="table table-responsive">
			    <tr>
			        	<th scope="col">num reclamation</th>
                <td scope="col"><?php echo $user['num_reclamation']; ?></td>
                </tr>
                <tr>
                <th scope="row">sujet</th>
                <td><?php echo $user['sujet']; ?></td>
                </tr>
                <tr>
                <th scope="row">description</th>
                <td><?php echo $user['description']; ?></td>
                </tr>
                <tr>
                <th scope="row">date reclamation</th>
                <td><?php echo $user['date_reclamation']; ?></td>
                </tr>
                <tr>
                <th scope="row">etat</th>
                <td><?php echo $user['etat']; ?></td>
                </tr>
                <tr>
                <th scope="row">id client</th>
                <td><?php echo $user['id_client']; ?></td>
                </tr>
               
                <tr>
                <th scope="row">num reponse</th>
                <td id="num"><?php echo $user['num_reponse']; ?></td>
                </tr>
                <tr>
                <th scope="row">description</th>
                <td><?php echo $user['descriptions']; ?></td>
                </tr>
                <tr>
                <th scope="row">date_reponse</th>
                <td><?php echo $user['date_reponse']; ?></td>
                </tr>
                <tr>
                <th scope="row">etat</th>
                <td><?php echo $user['etats']; ?></td>
                </tr>
                <tr>
                <th scope="row">num_question</th>
                <td><?php echo $user[	'num_question']; ?></td>
                </tr>
		</table>

        </div>
        <div id= "bt" class="btn-group-vertical me-2">
  <button class="btn btn-primary" onclick="location.href='afficherreclamations.php'"link><span>retour</span></button>
  <?php if($user['num_reponse']==null){ ?>
  <button class="btn btn-primary" onclick="location.href='afficherrepondreform.php'"link><span>repondre</span></button><?php } ?>
  <?php if($user['num_reponse']!=null){ ?>
  <button class="btn btn-primary" onclick="location.href='../controller/supprimerreponse.php'"link><span>supprimer reponse</span></button>
  <button class="btn btn-primary" onclick="location.href='modifierreponse.php'"link><span>moddifier reponse</span></button><?php } ?>
  <?php if($user['etat']!=3){ ?>
  <button class="btn btn-primary" onclick="location.href='../controller/archiverreclamation.php'"link><span>archiver</span></button><?php } ?>
  <?php if($user['etat']==3){ ?>
  <button class="btn btn-primary" onclick="location.href='../controller/desarchiverreclamation.php'"link><span>desarchiver</span></button><?php } ?>
</div>
</html>

<script>
  var num= document.getElementById('num');
    var n=num.innerHTML;
    document.cookie = 'num='+n+'; path=/';
</script>





