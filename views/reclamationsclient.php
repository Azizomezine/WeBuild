<?php include("header.php");
include("navbar1.php");?>
<style>
            #form
            {
                position: relative;
				top: 50px; left: 500px;
        width: 700px;
   				 height: 500px;
            }
            #btn{
				position: relative;
				top: 100px; left: 250px;
				width: 100px;
   				 height: 50px;
			}
            #btn1{
				position: relative;
				top: 100px; left: 1050px;
				width: 100px;
   				 height: 50px;
			}
        </style>
        <div id="form" >
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example">
                    
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <label for="floatingSelect">subject</label>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="votre reclamation"
                                    id="floatingTextarea" style="height: 400px;"></textarea>
                                <label for="floatingTextarea">reclamation</label>
                            </div>
                        </div>
    </div>
    <div class="m-n2">
<button id="btn" class="btn btn-primary m-2" onclick="location.href='acceuillereclamation.php'"link><span>retour</span></button>
  <button  id="btn1" type="submit" class="btn btn-primary m-2">envoyer</button>
</div>