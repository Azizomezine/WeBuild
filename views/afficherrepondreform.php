<?php include("header.php");
include("navbar1.php");
include("sidebar.php");
?>
<style>
            #floatingTextarea
            {
                position: relative;
				top: 0px; left: 500px;
            }
            #btn{
				position: relative;
				top: 600px; left: 250px;
				width: 100px;
   				 height: 50px;
			}
            #btn1{
				position: relative;
				top: 600px; left: 1050px;
				width: 100px;
   				 height: 50px;
			}
        </style>
<div class="m-n2">
<button id="btn" class="btn btn-primary m-2" onclick="location.href='afficherreclamations.php'"link><span>retour</span></button>

</div>
<div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <div class="form-floating">
                                <form action="../controller/ajouterreponse.php" method="POST">
                                <textarea class="form-control" placeholder="Leave a comment here"  
                                    id="floatingTextarea" style="height: 500px;"  name="description"></textarea>
                                    <input id="num_reclamation" class="num_reclamation" type="hidden" value=<?PHP echo intval($_COOKIE['currentnum']);?> name="num_reclamation">
                                    <button  id="btn1" type="submit" class="btn btn-primary m-2" style="top: 10px;">envoyer</button>
                                <label for="floatingTextarea">réponse</label>
        </form>
                            </div>
                        </div>
                    </div>
                   