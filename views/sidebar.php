<?php include("header.php"); 
include '../controller/reclamationsc.php';
?>
<div class="sidenav">
    






  <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="#" class="navbar-brand mx-4 mb-3">
                <img id="myImg"  src="l.png">
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="../img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">ghaith sebai</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="#" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

    <?php $notif=0; 
    $reclamationsc=new reclamationsc();//appel au controlleur
    $listereclamations=$reclamationsc->afficher_reclamations();
    foreach($listereclamations as $reclamations){
      if($reclamations['etat']==0){
        $notif=$notif+1;
      }
    };

    ?>

    <a class="notification nav-item nav-link" href="afficherreclamations.php" ><i class="fa fa-envelope"></i> reclamations<?php if($notif !=0){?><span class="badge"><?php echo $notif?></span></a><?php };?>
    
                    </div>


                </div>
            </nav>
        </div>