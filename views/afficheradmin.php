<?PHP
include_once '../Model/Question.php';
include_once '../Model/Reponse.php';
include_once '../Model/Categorie.php';
//include_once '../controller/QuestionC.php';
include_once '../controller/ReponseC.php';
include_once '../controller/CategorieC.php';
	$QuestionC=new QuestionC();
	$listeQuestion=$QuestionC->afficherquestion();
    $ReponseC = new ReponseC();
    $listeReponse=$ReponseC->affichertousreponse();
    $CategorieC = new CategorieC();
    $listeCategorie=$CategorieC->affichertousCategorie();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img1/favicon.ico" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib1/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib1/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css1/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css1/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Jhon Doe</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="AjouterCategorie.php" class="nav-item nav-link"><i class="fa fa-plus"></i>Add Category</a>
                    <a href="afficheradmin.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
                    <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
                   
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">John Doe</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


             <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Questions</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                   
                                    <th scope="col">RefQ</th>
                                    <th scope="col">TitreQ</th>
                                    <th scope="col">DesQ</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Date_publication</th>
                                    <th scope="col">QuestionStat</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?PHP
				foreach($listeQuestion as $Question){
			?>
                                <tr>
                                   
                                    <td><?PHP echo $Question['RefQ']; ?></td>
                                    <td><?PHP echo $Question['TitreQ']; ?></td>
                                    <td>     <div class="ques-details10018"><?PHP echo $Question['DesQ']; ?></div>
                                            </div></td>
                                    <td><?PHP echo $Question['Category']; ?></td>
                                    <td><?PHP echo $Question['Date_publication']; ?></td>
                                    <td><?PHP echo $Question['QuestionStat']; ?></td>
                                    <td><div class="btn-group"><form method="POST" action="supprimerQuestionadmin.php"><button type="submit"  class="btn btn-sm btn-primary" >Delete</button><input type="hidden" value=<?PHP echo $Question['RefQ']; ?> name="RefQ"></form>
                                    <a class="btn btn-sm btn-primary" href="modifierQuestion.php?RefQ=<?PHP echo $Question['RefQ']; ?>">Modify</a>

                                    <a class="btn btn-sm btn-primary" href="questionadmindetail.php?RefQ=<?PHP echo $Question['RefQ']; ?>">Details</div></td>

                                </td>
                                </tr>
                                <?PHP
				}
			?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->
 <!-- Recent Sales Start -->
 <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Reponse</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                   
                                    <th scope="col">Idreponse</th>
                                    <th scope="col">Contentreponse</th>
                                    <th scope="col">DatePublication</th>
                                    <th scope="col">RefQC</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?PHP
				foreach($listeReponse as $Reponse){
			?>
                                <tr>
                                   
                                    <td><?PHP echo $Reponse['Idreponse']; ?></td>
                                    <td> <div class="ques-details10018"> <div class="ques-details10018">
                                              <?PHP echo $Reponse['Contentreponse']; ?> </div> </div></td>
                                    <td><?PHP echo $Reponse['DatePublication']; ?></td>
                                    <td><?PHP echo $Reponse['RefQC']; ?></td>
                                  <td><div class="btn-group"><form method="POST" action="supprimerreponseadmin.php"><button type="submit"  class="btn btn-sm btn-primary" >Delete</button><input type="hidden" value=<?PHP echo $Reponse['Idreponse']; ?> name="Idreponse"></form>
                                  <a class="btn btn-sm btn-primary" href="modifierReponse.php?Idreponse=<?PHP echo $Reponse['Idreponse']; ?>& RefQ=<?PHP echo $Reponse['RefQC']; ?>">Modify
                                  <a class="btn btn-sm btn-primary" href="detailreponseadmin.php?Idreponse=<?PHP echo $Reponse['Idreponse']; ?>">Details</a></div></td>       
                                     
                                  
                                
                                </tr>
                                <?PHP
				}
			?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Categorie</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                   
                                    <th scope="col">Idc</th>
                                    <th scope="col">nom categorie</th>
                                    <th scope="col">descateg</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?PHP
				foreach($listeCategorie as $Categorie){
			?>
                                <tr>
                                   
                                    <td><?PHP echo $Categorie['idC']; ?></td>
                                    <td> <div class="ques-details10018"><?PHP echo $Categorie['ncateg']; ?> </div></td>
                                    <td><?PHP echo $Categorie['descateg']; ?></td>
                                   
                                  <td><div class="btn-group"><form method="POST" action="supprimercategadmin.php"><button type="submit"  class="btn btn-sm btn-primary" >Delete</button><input type="hidden" value=<?PHP echo $Categorie['idC']; ?> name="idC"></form>
                                    <a class="btn btn-sm btn-primary" href="modifiercateg.php?idc=<?PHP echo $Categorie['idC']; ?>">Modify</a>
                                   </div></td>
                                </tr>
                                <?PHP
				}
			?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Trippe</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>