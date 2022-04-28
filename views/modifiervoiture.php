<?php
include "../controller/VoitureC.php";
include_once '../model/Voiture.php';

$voitureC = new VoitureC();
$error = "";

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

        $voitureC->modifiervoiture($voiture, $_GET['id']);
        header('refresh:5;url=../trippie back/index.php');
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
</head>

<body>
    <button><a href="../trippie back/index.php">Retour à la liste</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_GET['id'])) {
        $voiture = $voitureC->recuperervoiture($_GET['id']);

    ?>
        <div class="container">
            <form action="" method="POST" name="f1"onSubmit="return validateForm()">

                <input type="text" name="id" id="id" value="<?php echo $voiture['Id']; ?>" disabled>
                <input type="text" placeholder="Matricule" name="matricule" id="matricule"  value="<?php echo $voiture['Matricule']; ?>">
                <p id="errorMat" class="error"></p>
                <input type="text" placeholder="Marque" name="marque" id="marque" value="<?php echo $voiture['Marque']; ?>">
                <p id="errorMar" class="error"></p>

                <input type="text" placeholder="Prix" name="prix" id="prix"  value="<?php echo $voiture['Prix']; ?>">
                <p id="errorPr" class="error"></p>

                <input type="file" placeholder="Image" name="image" id="image" value="<?php echo $voiture['Image']; ?>">
                <p id="errorIm" class="error"></p>

                <div class="btn-box">
                    <pre>  <input type="submit" value="Modifier" name = "modifer">  <input type="reset" value="Annuler" > </pre>
                </div>

            </form>
        </div>

    <?php
    }
    ?>
</body>

</html>