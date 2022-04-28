<?php
<?php
session_start();


if(!isset($_SESSION["username"]))
{
	header("location:index.php");
}
?>
<link rel="stylesheet"  href="navbar.css">
<div class="navbar">
    <img src="LOGO.png" class="logo">
    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">carpool</a></li>
        <li><a href="#">transport</a></li>
        <li><a href="#">Car rental</a></li>
        <li><a href="register.php">Sign in</a></li>
        <script language="javascript" type="text/javascript" src="../main.js"></script>
    </ul>
    
</div>

<style>
     @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

.navbar{
    width:85% ;
    margin:auto ; 
    margin-top: 0.5cm ; 
    padding: 35 px 0 ; 
    display : flex ; 
    align-items:center ;
    justify-content : space-between ; 
}
.logo{
    width: 120px ;
    cursor: pointer;
}
.navbar ul li{

     list-style: none;
     display:  inline-block;
     margin : 0 20px; 
     position:relative;

}
.navbar ul li a{
    text-decoration: none;
    color: rgb(15, 14, 17) ; 
    text-transform: uppercase ; 
}
.navbar ul li::after{
    content: '';
    height:3px ; 
    width: 0;
    background : #1A73E8;
    position:absolute ; 
    left : 0 ; 
    top : 30px;
    bottom : -40 px ; 
    transition: 0.5s;
    
}
.navbar ul li:hover::after{
    width : 100% ;
}
   
    </style>