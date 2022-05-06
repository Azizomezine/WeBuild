<?php include("header.php");
include("navbar1.php");
include("sidebar.php");


$reclamationsc=new reclamationsc();//appel au controlleur
$listereclamations=$reclamationsc->afficher_reclamations();
 
?>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
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
      #btn_tout{
				position: relative;
				top: 108px; left: 495px;
        font-size: 10px;
            width: 50px;
            height: 25px;

			}
      #btn_non_lue{
				position: relative;
				top: 108px; left: 495px;
        font-size: 10px;
            width: 60px;
            height: 25px;

			}
      #btn_lue{
				position: relative;
				top: 108px; left: 495px;
            font-size: 10px;
            width: 50px;
            height: 25px;

			}
      .pagination
{
  position: relative;
  left: 905px;top: 500px;
}
        </style>

<div class="m-n2">
  <button id="btn" class="btn btn-primary m-2" onclick="location.href='archive.php'"link><span>Archive</span></button>
</div>
		<div class="tab">
    <?php 
$db = config::getConnexion();

if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}

// On détermine le nombre total d'articles
if($_COOKIE['etat']==0){
$sql = 'SELECT COUNT(*) AS nb_articles FROM `reclamations` ;';
};
if($_COOKIE['etat']==1){
$sql = 'SELECT COUNT(*) AS nb_articles FROM `reclamations` WHERE etat=0;';
};
if($_COOKIE['etat']==2){
$sql = 'SELECT COUNT(*) AS nb_articles FROM `reclamations` WHERE etat=1;';
};

// On prépare la requête
$query = $db->prepare($sql);

// On exécute
$query->execute();

// On récupère le nombre d'articles
$result = $query->fetch();

$nbArticles = (int) $result['nb_articles'];
// On détermine le nombre d'articles par page
$parPage = 5;

// On calcule le nombre de pages total
$pages = ceil($nbArticles / $parPage);
$premier = ($currentPage * $parPage) - $parPage;
if($_COOKIE['etat']==0){
$sql = 'SELECT * FROM `reclamations`  LIMIT :premier, :parpage;';
};
if($_COOKIE['etat']==1){
$sql = 'SELECT * FROM `reclamations` WHERE etat=0 LIMIT :premier, :parpage ;';
};
if($_COOKIE['etat']==2){
$sql = 'SELECT * FROM `reclamations` WHERE etat=1 LIMIT :premier, :parpage ;';
};
// On prépare la requête
$query = $db->prepare($sql);

$query->bindValue(':premier', $premier, PDO::PARAM_INT);
$query->bindValue(':parpage', $parPage, PDO::PARAM_INT);

// On exécute
$query->execute();

// On récupère les valeurs dans un tableau associatif
$listereclamations = $query->fetchAll(PDO::FETCH_ASSOC);
?>
    <button id="btn_tout" class="btn btn-primary m-2" ><span>tout</span></button>
    <button id="btn_non_lue" class="btn btn-primary m-2" ><span>non lue</span></button>
    <button id="btn_lue" class="btn btn-primary m-2" ><span>lue</span></button>
		<table border="1" align="center" id="rec" class="table table-responsive tritable"  >
			<tr>
				<th scope="col">num de reclamation</th>
				<th scope="col">sujet</th>
				<th scope="col">date reclamation</th>
				<th scope="col">etat</th>
				<th scope="col">id client</th>

			</tr>
			<?php
				foreach($listereclamations as $reclamations){
					if($reclamations['etat']!=3){
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
			

			<?php
				}}
			?>
		<script>
document.addEventListener("readystatechange", function(evt) {
  if (document.readyState=="interactive") {
    /* Trouver et parcourir tous les tableaux de classe tritable */
    var elts=document.querySelectorAll("table.tritable");
    for (var i=0; i<elts.length; i++) {
      elts[i].dataset.tritable=true;
      /* Rechercher toutes les en-têtes de l'élément i */
      var ths=elts[i].querySelectorAll("th");
      for (var j=0; j<ths.length; j++) {
        /* Ajout de l'icone indiquant la possibilité de tri */  
        ths[j].innerHTML+=" <i class=\"fas fa-sort light\"></i>";
        ths[j].dataset.sens="";
        /* Ajout de l'event click */  
        ths[j].addEventListener("click", triColonne, false);
      }
    }
  }
});
  
  
/* Fonction appelée sur le clic du titre de colonne */  
function triColonne(evt) {
  var elt=evt.currentTarget;
  var table=elt.parentElement.parentElement.parentElement;
  /* Mise à jour des icones du sens de tri sur tous les TH */
  var ths=table.querySelectorAll("th");
  for (var j=0; j<ths.length; j++) {
    var icon=ths[j].querySelector("i.fas");
    if (ths[j]===elt) {
      /* On est sur la colonne cliquée */
      /* Détermination du sens de tri en fonction du sens actuel */
      if (ths[j].dataset.sens=="up") { 
          var sens="down";
      } else {
          var sens="up";
      }
      icon.className="fas fa-sort-"+sens+" active";        
      /* Lancement du tri du tableau table sur la colonne j dans le bon sens */
      ths[j].dataset.sens=sens;
      triTable(table, j, sens);
    } else {
      /* On repasse à l'icone non trié pour les autres colonnes */  
      ths[j].dataset.sens="";
      icon.className="fas fa-sort light";
    }
  }
} 
/* Fonction de tri de la colonne numColonne de table en sens up ou down */
function triTable(table, numColonne, sens) { 
  var tbody=table.getElementsByTagName("tbody")[0];
  var trs=tbody.getElementsByTagName("tr"); /* Liste des lignes TR */
  var triABulle=true; /* Indicateur que le tri n'est pas terminé */
  var nbMouvement=0;
  while (triABulle) { /* Tant que le tri n'est pas terminé */
    var isInversion=false;
    /* Parcourir la liste des lignes de 1 (hors en-tête) à N-1 */
    for (var i=1; i < trs.length - 1; i++) { 
      var tdCi=trs[i].getElementsByTagName("td")[numColonne];
      var tdCiplus1=trs[i+1].getElementsByTagName("td")[numColonne];
	  if (tdCi.className=="nb") { /* Colonne numérique : Conversion en nombres */
        var ei=parseFloat(tdCi.innerText);
        var eiplus1=parseFloat(tdCiplus1.innerText);
      } else { /* Colonne text simple */
        var ei=tdCi.innerText.toLowerCase();
        var eiplus1=tdCiplus1.innerText.toLowerCase();
      }
      if ((sens=="up") && ( ei > eiplus1 )) {
          /* Sens croissant, ligne i est plus grande que ligne i+1 : inversion */    
         isInversion=true;
        nbMouvement++;
        break;  /* La boucle for est interrompue pour réaliser l'inversion */
      }
      if ((sens=="down") && ( ei < eiplus1 )) {
          /* Sens décroissant, ligne i est plus petite que ligne i+1 : inversion */    
         isInversion=true;
        nbMouvement++;
        break;  /* La boucle for est interrompue pour réaliser l'inversion*/
      }
    }
    if (isInversion) { 
      /* il faut inverser les lignes i et i+1 */
      trs[i].parentNode.insertBefore(trs[i + 1], trs[i]);
    } else {
       /* Pas de mouvement, le tri à bulles est terminé */ 
       triABulle=false;
    }
  }
  console.log(nbMouvement+" mouvements pour la colonne N°"+numColonne+" sens "+sens);
} 
  
</script>
<script>
    
	var t = document.getElementById('rec');
	for(var i =1; i < t.rows.length; i++)
	{



		t.rows[i].onclick = function()
		{
			currentnum = this.cells[0].innerHTML;	
			
			document.cookie = 'currentnum='+currentnum+'; path=/';
			window.location.href='consulteruserreclamation.php';



                                   
                                

		   	
		};
	}
	

</script>
<nav>
                    <ul class="pagination">
                        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                            <a href="afficherreclamations.php?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                        </li>
                        <?php for($page = 1; $page <= $pages; $page++): ?>
                          <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                          <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                                <a href="afficherreclamations.php?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                            </li>
                        <?php endfor ?>
                          <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                          <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                            <a href="afficherreclamations.php?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                        </li>
                    </ul>
                </nav>


    <script>document.getElementById("btn_tout")
        .addEventListener("click", function() {
            
          document.cookie = 'etat='+0+'; path=/';
          window.location.assign("afficherreclamations.php?page=1");

});
</script>
<script>document.getElementById("btn_non_lue")
        .addEventListener("click", function() {
           
  
          document.cookie = 'etat='+1+'; path=/';
          window.location.assign("afficherreclamations.php?page=1");

});
</script>
<script>document.getElementById("btn_lue")
        .addEventListener("click", function() {
            
          document.cookie = 'etat='+2+'; path=/';
          window.location.assign("afficherreclamations.php?page=1");
 

});
</script>


</table>

</div>
</html>







