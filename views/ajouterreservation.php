<?php
include_once '../model/Reserver.php';
include_once '../controller/ReserverC.php';

$error = "";

// create user
$reservation = null;

// create an instance of the controller
$reserverC = new ReserverC();
if (
    isset($_POST["date_permis"]) &&
    isset($_POST["date_debut"]) &&
    isset($_POST["date_retour"]) &&
    isset($_POST["ville"])
) {
    if (
        !empty($_POST["date_permis"]) &&
        !empty($_POST["date_debut"]) &&
        !empty($_POST["date_retour"]) &&
        !empty($_POST["ville"])
    ) {
        $reservation = new Reserver(
            $_POST['date_permis'],
            $_POST['date_debut'],
            $_POST['date_retour'],
            $_POST['ville']

        );
        $reserverC->ajouterreservation($reservation);
        header('Location:../views/store 2.php');
    } else
        $error = "Missing information";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reservation Display</title>
    <link href="../views/style.css" rel="stylesheet">
    <style>
        .error {
            color: red;
        }
   
    </style>
    <script >
        function validateForm2() {
    var letters = /^[A-Za-z]+$/;
    var dateNow = new Date();
    var dp = document.getElementById("date_permis").value;
    var db = document.getElementById("date_debut").value;
    var dr = document.getElementById("date_retour").value;
    var vi = document.getElementById("ville").value;
    var errordp = document.getElementById('errorDp'); 
    var errordb = document.getElementById('errorDd'); 
    var errordr = document.getElementById('errorDr'); 
    var errorvi = document.getElementById('errorVi'); 


 if (new Date(dp).toLocaleString() > dateNow.toLocaleString()) {
errordp.innerHTML = "la date permis  supeireur a date systeme  !" ;
return false ;
}

else if(new Date(db).toLocaleString() < dateNow.toLocaleString()) {
    errordp.innerHTML= "la date debut inferieur a date systeme   !";
return false ;
}

else if(new Date(dr).toLocaleString() < dateNow.toLocaleString()) {
alert( " date retour est inferieur  a date systeme  !");
return false ;
}
else if ((new Date(dr).toLocaleString())<(new Date(db).toLocaleString()))
{
    alert ("la date retour est inferieur a date debut  ") ; 
    return false ;
}
else if (vi == "") {
    errorvi.innerHTML = "Veuillez entrer une matricule !";
        return false;
}
        }

    </script>


</head>

<body>

   

    <div id="error">
        <?php echo $error; ?>
    </div>
    <div class="center">
        <h1>reserver votre voiture </h1>
        <form action="" method="POST" name="f2"onSubmit="return validateForm2()">


<div class="txt_field">
            <input type="date" name="date_permis" id="date_permis">
            <label> date permis </label>
            <p id="errorDp" class="error"></p>
    </div>
    <div class="txt_field">
            <input type="date" name="date_debut" id="date_debut" >
            <label> date debut  </label>
            <p id="errorDd" class="error"></p>
    </div>

    <div class="txt_field">
            <input type="date" name="date_retour" id="date_retour">
            <label> date retour  </label>
            <p id="errorDr" class="error"></p>
    </div>
    <div class="txt_field">
            <input type="text" placeholder="ville" name="ville" id="ville">
            <label>  ville  </label>
            <p id="errorVi" class="error"></p>
    </div>
            <div class="btn-box">
<pre><input type="submit" value="Envoyer">
<button type="reset" value="Annuler" ><a href="../views/store 2.php">annuler </a></button>
    </pre>
            </div>
                   
        </form>
        </div>
    </body>
</html>