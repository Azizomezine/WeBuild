<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>voyage | Landing, Corporate &amp; Business Templatee</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="assets/css/theme.css" rel="stylesheet" />

  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="index.html"><img class="d-inline-block" src="assets/img/gallery/logo.png" width="50" alt="logo" /></a>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto pt-2 pt-lg-0 font-base">
              <li class="nav-item px-2"><a class="nav-link fw-medium active" aria-current="page" href="#destinations"><span class="nav-link-icon text-800 me-1 fas fa-map-marker-alt"></span><span class="nav-link-text">Locations </span></a></li>
              <li class="nav-item px-2"><a class="nav-link" href="#flights"> <span class="nav-link-icon text-800 me-1 fas fa-plane"></span><span class="nav-link-text">Flights</span></a></li>
              <li class="nav-item px-2"><a class="nav-link" href="#hotels"> <span class="nav-link-icon text-800 me-1 fas fa-hotel"></span><span class="nav-link-text">Hotels</span></a></li>
              <li class="nav-item px-2"><a class="nav-link" href="#activities"><span class="nav-link-icon text-800 me-1 fas fa-bolt"></span><span class="nav-link-text">Activities</span></a></li>
            </ul>
            <form>
              <button class="btn text-800 order-1 order-lg-0 me-2" type="button">Support</button>
              <button class="btn btn-voyage-outline order-0" type="submit"><span class="text-primary">Sign in</span></button>
            </form>
          </div>
        </div>
      </nav>
        <div class="bg-holder w-50 bg-right d-none d-lg-block" 
        <form action="" method="POST" class="login-email">

<table>

    <div class="col-12 col-xl-10 col-lg-12 d-grid mt-6">
            <textarea name="descriptif" placeholder="Describe your profile" id="descriptif" ></textarea>
        </div>
<br>
<br>



<div class="col-12 col-xl-10 col-lg-12 d-grid mt-6">
  <select name="libelle" id="libelle" class="">
          <option selected disabled>Your role</option>
          <option value="admin" name="libelle" >Admin</option>
          <option value="compagnie"name="libelle">Responsible Company</option>
          <option value="client"name="libelle">Customer</option>
  </div>


        
    
</table>

  <div class="col-12 col-xl-10 col-lg-12 d-grid mt-6" action="">	
<button name="submit" class="btn btn-secondary"  >Confirm</button>
<p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
  </div>
    
  
  
</form>
    </div>
<?php
if($r==1)
{
$roleC->addrole($role);
}
?>  
        </div>
      <section class="mt-7 py-0">
      
        <!--/.bg-holder-->

        <div class="container">
          <div class="row">
            <div class="col-lg-6 py-5 py-xl-5 py-xxl-7">
              <h1 class="display-3 text-1000 fw-normal">Let’s make a tour</h1>
              <h1 class="display-3 text-primary fw-bold">Discover the beauty</h1>
              <div class="pt-5">
                <nav>
                  <div class="nav nav-tabs voyage-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-map-marker-alt"></i></button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"> <i class="fas fa-plane"></i></button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false"> <i class="fas fa-hotel"></i></button>
                  </div>
                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                      <form class="row g-4 mt-5">
                        <div class="col-sm-6 col-md-6 col-xl-5">
                          <div class="input-group-icon">
                            <label class="form-label visually-hidden" for="inputAddress1">Address 1</label>
                            <input class="form-control input-box form-voyage-control" type="text" placeholder="Adress of your picture" name="image" id="image"  required /><span class="nav-link-icon text-800 fs--1 input-box-icon"><i class="fas fa-user"></i></span>
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-xl-5">
                          <div class="input-group-icon">
                            <label class="form-label visually-hidden" for="inputAddress2">Address 2</label>
                            <input class="form-control input-box form-voyage-control" type="text" placeholder="Name" name="nom" id="nom"  required /><span class="nav-link-icon text-800 fs--1 input-box-icon"><i class="fas fa-user"> </i></span>
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-xl-5">
                          <div class="input-group-icon">
                          <label class="form-label visually-hidden" for="inputAddress2">Address 2</label>
                            <input class="form-control input-box form-voyage-control" type="text" placeholder="Lastname" name="prenom" id="prenom"  required /><span class="nav-link-icon text-800 fs--1 input-box-icon"><i class="fas fa-user"></i></span>
                          </div>
                        </div>

                        <div class="col-sm-6 col-md-6 col-xl-5">
                          <div class="input-group-icon">
                            <input class="form-control input-box form-voyage-control" type="text" placeholder="Age" name="age" id="age"  required /><span class="nav-link-icon text-800 fs--1 input-box-icon"><i class="fas fa-user"></i></span>
                          </div>
                          </div>
                          <div class="col-sm-6 col-md-6 col-xl-5">
                          <div class="input-group-icon">
                            <input class="form-control input-box form-voyage-control" type="text" placeholder="Username" name="username" id="username"  required /><span class="nav-link-icon text-800 fs--1 input-box-icon"><i class="fas fa-user"></i></span>
                          </div>
                          </div>
                          <div class="col-sm-6 col-md-6 col-xl-5">
                          <div class="input-group-icon">
                            <input class="form-control input-box form-voyage-control" type="text" placeholder="Adress" name="adresse" id="adresse"  required /><span class="nav-link-icon text-800 fs--1 input-box-icon"><i class="fas fa-user"></i></span>
                          </div>
                          </div>
                          <div class="col-sm-6 col-md-6 col-xl-5">
                          <div class="input-group-icon">
                            <input class="form-control input-box form-voyage-control" type="text" placeholder="GSM" name="gsm" id="gsm"  required /><span class="nav-link-icon text-800 fs--1 input-box-icon"><i class="fas fa-user"></i></span>
                          </div>
                          </div>
                          <div class="col-sm-6 col-md-6 col-xl-5">
                          <div class="input-group-icon">
                            <input class="form-control input-box form-voyage-control" type="text" placeholder="Email" name="email" id="email"  required /><span class="nav-link-icon text-800 fs--1 input-box-icon"><i class="fas fa-user"></i></span>
                          </div>
                          </div>
                          <div class="col-sm-6 col-md-6 col-xl-5">
                          <div class="input-group-icon">
                            <input class="form-control input-box form-voyage-control" type="text" placeholder="Password" name="password" id="password"  required /><span class="nav-link-icon text-800 fs--1 input-box-icon"><i class="fas fa-user"></i></span>
                          </div>
                          </div>
                          <div class="col-sm-6 col-md-6 col-xl-5">
                          <div class="input-group-icon">
                            <input class="form-control input-box form-voyage-control" type="text" placeholder="Confirm Password" name="cpassword" id="cpassword"  required /><span class="nav-link-icon text-800 fs--1 input-box-icon"><i class="fas fa-userr"></i></span>
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-xl-5">
                          <div class="input-group-icon">
     
                            
                            </select><span class="nav-link-icon text-800 fs--1 input-box-icon"><i class="fas fa-user"> </i></span>
                          </div>
                        </div>
                        <div class="col-12 col-xl-10 col-lg-12 d-grid mt-6">
                          <button class="btn btn-secondary" type="submit">Search Packages</button>
                        </div>
                      </form>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                      <form class="row g-4 mt-5">
                        <div class="col-6">
                          <div class="input-group-icon">
                            <label class="form-label visually-hidden" for="inputAddressThree">Address 1</label>
                            <input class="form-control input-box form-voyage-control" id="inputAddressThree" type="text" placeholder="From where" /><span class="nav-link-icon text-800 fs--1 input-box-icon"><i class="fas fa-map-marker-alt"></i></span>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="input-group-icon">
                            <label class="form-label visually-hidden" for="inputAddressFour">Address 2</label>
                            <input class="form-control input-box form-voyage-control" id="inputAddressFour" type="text" placeholder="To where" /><span class="nav-link-icon text-800 fs--1 input-box-icon"><i class="fas fa-map-marker-alt"> </i></span>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="input-group-icon">
                            <input class="form-control input-box form-voyage-control" id="inputDateThree" type="date" /><span class="nav-link-icon text-800 fs--1 input-box-icon"><i class="fas fa-calendar"></i></span>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="input-group-icon">
                            <input class="form-control input-box form-voyage-control" id="inputDateFour" type="date" /><span class="nav-link-icon text-800 fs--1 input-box-icon"><i class="fas fa-calendar"></i></span>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="input-group-icon">
                            <label class="form-label visually-hidden" for="inputPeopleTwo">People</label>
                            <select class="form-select form-voyage-select input-box" id="inputPeopleTwo">
                              <option selected="selected">2 Adults</option>
                              <option>2 Adults 1 children</option>
                              <option>2 Adults 2 children</option>
                            </select><span class="nav-link-icon text-800 fs--1 input-box-icon"><i class="fas fa-user"> </i></span>
                          </div>
                        </div>
                        <div class="col-12 d-grid mt-6">
                          <button class="btn btn-secondary" type="submit">Search Packages</button>
                        </div>
                      </form>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                      <form class="row g-4 mt-5">
                        <div class="col-6">
                          <div class="input-group-icon">
                            <input class="form-control input-box form-voyage-control" id="inputDateFive" type="date" /><span class="nav-link-icon text-800 fs--1 input-box-icon"><i class="fas fa-calendar"></i></span>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="input-group-icon">
                            <input class="form-control input-box form-voyage-control" id="inputDateSix" type="date" /><span class="nav-link-icon text-800 fs--1 input-box-icon"><i class="fas fa-calendar"></i></span>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="input-group-icon">
                            <label class="form-label visually-hidden" for="inputPeopleThree">Person</label>
                            <select class="form-select form-voyage-select input-box" id="inputPeopleThree">
                              <option selected="selected">2 Adults</option>
                              <option>2 Adults 1 children</option>
                              <option>2 Adults 2 children</option>
                            </select><span class="nav-link-icon text-800 fs--1 input-box-icon"><i class="fas fa-user"> </i></span>
                          </div>
                        </div>
                        <div class="col-12 d-grid mt-6">
                          <button class="btn btn-secondary" type="submit">Search Packages</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </section>


      <!-- ============================================-->
      <!-- <section> begin ============================-->
      
      <!-- <section> close ============================-->
      <!-- ============================================-->


    


      <!-- ============================================-->
      <!-- <section> begin ============================-->

      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
     
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
   
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
     
      <!-- <section> close ============================-->
      <!-- ============================================-->


    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="vendors/@popperjs/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="vendors/fontawesome/all.min.js"></script>
    <script src="assets/js/theme.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;400;600;700&amp;display=swap" rel="stylesheet">
  </body>

</html>