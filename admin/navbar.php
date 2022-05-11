
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
   <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>TRIPEE</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="<?php echo $user2['image'] ?>"  alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $user2['username'] ?></h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
				<a href="index.php?page=home" class="nav-item nav-link"><span class='icon-field'><i class="fa fa-home"></i></span>  Home</a>
                <a href="index.php?page=user" class="nav-item nav-link"><i class="fa fa-users"></i>  Users</a>
                    <a href="index.php?page=booked" class="nav-item nav-link"><i class="fa fa-book"></i>  booked flights</a>
                    <a href="index.php?page=flights" class="nav-item nav-link"><i class="fa fa-fighter-jet"></i>  Flights</a>
                    <a href="index.php?page=airport" class="nav-item nav-link"><i class="fa fa-plane"></i>  Airport</a>
                    <a href="index.php?page=airlines" class="nav-item nav-link"><i class="fa fa-plane"></i>  Airlines</a>
                
                  
                            <a href="index.php?page=cars" class="nav-item nav-link"><i class="fa fa-car"></i>Cars</a>
                            <a href="index.php?page=reservation" class="nav-item nav-link"><i class="fa fa-bookmark"></i>  booked Cars</a>
                            <a href="index.php?page=forum" class="nav-item nav-link"><i class="fa fa-comments"></i>   forum</a>
                     
                            <a href="index.php?page=AjouterCategorie" class="nav-item nav-link"><i class="fa fa-plus"></i>  Add category</a>
                          
                            <!-- reservation-->
                       <!-- nour bus-->
                       <a href="index.php?page=schedule" class="nav-item nav-link"><i class="fas fa-calendar me-2"></i>Bus Schedule</a></li>
                            <a href="index.php?page=bookedbus" class="nav-item nav-link"><i class="fas fa-list me-2"></i>Booked Bus</a>
                            <a href="index.php?page=bus" class="nav-item nav-link"><i class="fas fa-bus me-2"></i>Bus List</a>
                             <a href="index.php?page=location" class="nav-item nav-link"><i class="fas fa-road me-2"></i>Road List</a>
                    
                
                    
                   
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->
</body>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')</script>
  

