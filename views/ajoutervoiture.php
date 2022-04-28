<?php
include_once '../model/Voiture.php';
include_once '../controller/VoitureC.php';

$error = "";

// create user
$voiture = null;

// create an instance of the controller
$voitureC = new VoitureC();
if (
    isset($_POST["matricule"]) &&
    isset($_POST["marque"]) &&
    isset($_POST["prix"]) &&
    isset($_POST["image"])
) {
    if (
        !empty($_POST["matricule"]) &&
        !empty($_POST["marque"]) &&
        !empty($_POST["prix"]) &&
        !empty($_POST["image"])
    ) {
        $voiture = new Voiture(
            $_POST['matricule'],
            $_POST['marque'],
            $_POST['prix'],
            $_POST['image']
        );
        $voitureC->ajoutervoiture($voiture);
        header('Location:../trippie back/index.php');
    } else
        $error = "Missing information";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>voiture Display</title>
    <style>
        .error {
            color: red;
        }
    </style>
    <script type="text/javascript" src="../views/include/script.js"></script>
    <link href="../views/include/ajouter.css" rel="stylesheet">

</head>

<body>
    <button><a href="affichervoiture.php">Retour à la liste</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>
    <div class="container">
        <form action="" method="POST" name="f1"onSubmit="return validateForm()">

            <input type="text" placeholder="matricule" name="matricule" id="matricule">
            <p id="errorMat" class="error"></p>


            <input type="text" placeholder="marque" name="marque" id="marque">
            <p id="errorMar" class="error"></p>


            <input type="text" placeholder="Prix" name="prix" id="prix">
            <p id="errorPr" class="error"></p>


            <input type="file" placeholder="Image" name="image" id="image">
            <p id="errorIm" class="error"></p>

            <div class="btn-box">
                <pre> <input type="submit" value="Envoyer">  <input type="reset" value="Annuler" ></pre>
            </div>

        </form>
    </div>
</body>

</html>