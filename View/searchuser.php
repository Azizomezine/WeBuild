<?php
require_once '../controller/roleC.php';
$roleC=new roleC();
$role=$roleC->afficher();
if (isset($_POST['roles'])&& isset ($_POST['search'])){
    $list=$roleC->afficherUser($_POST['roles']);
}
?>