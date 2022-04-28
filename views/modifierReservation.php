<?php
include "../controller/ReserverC.php";
include_once '../model/Reserver.php';

$reserverC = new ReserverC();
$error = "";

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

        $reserverC->modifierreservation($reservation, $_GET['id']);
        header('refresh:5;url=../trippie back/index2.php');
    } else
        $error = "Missing information";
}

?>
<html>

<head>
    <title>Modifier Utilisateur</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../views/include/ajouter.css" rel="stylesheet">
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
errorDp.innerHTML = "la date permis  supeireur a date systeme  !" ;
return false ;
}

else if(new Date(db).toLocaleString() < dateNow.toLocaleString()) {
    errorDb.innerHTML= "la date debut inferieur a date systeme   !";
return false ;
}

else if(new Date(dr).toLocaleString() < dateNow.toLocaleString()) {
    errorDb.innerHTML="date retour est inferieur  a date systeme  !";
return false ;
}
else if ((new Date(dr).toLocaleString())<(new Date(db).toLocaleString()))
{
    errorDr.innerHTML="la date retour est inferieur a date debut  "; 
    return false ;
}
else if (vi == "") {
        errorVi.innerHTML = "Veuillez entrer une matricule !";
        return false;
}
        }

    </script>

</head>

<body>
    <button><a href="../trippie back/index2.php">Retour à la liste</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_GET['id'])) {
        $reservation = $reserverC->recupererreservation($_GET['id']);

    ?>
        <div class="container">
            <form action="" method="POST"name="f2"onSubmit="return validateForm2()" >


                <input type="text" name="id" id="id" value="<?php echo $reservation['Id']; ?>" disabled>

                <input type="date" name="date_permis" id="date_permis"  value="<?php echo $reservation['Date_permis']; ?>">
                <p id="errorDp" class="error"></p>


                <input type="date" name="date_debut" id="date_debut"  value="<?php echo $reservation['Date_debut']; ?>">
                <p id="errorDd" class="error"></p>
                <input type="date" name="date_retour" id="date_retour" value="<?php echo $reservation['Date_retour']; ?>">
                <p id="errorDr" class="error"></p>

                <input type="text" placeholder="ville" name="ville" id="ville" value="<?php echo $reservation['Ville']; ?>">
                <p id="errorDv" class="error"></p>

                <div class="btn-box">
                    <pre> <input type="submit" value="Modifier" name = "modifer"> <input type="reset" value="Annuler" > </pre>
                </div>

            </form>
        </div>
    <?php
    }
    ?>
</body>

</html>