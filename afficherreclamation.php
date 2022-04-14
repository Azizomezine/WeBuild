<!DOCTYPE html>
<html lang="en">
<head>
<?php include("navbar.php");
include '../Model/reclamations.php';
include '../Controller/reclamationsc.php';?> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>trippie</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Grape+Nuts&display=swap" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>
<body>
  
<div class="wrapper">
            <div>
                 <img src="../Resources/Images/banner.svg"  >
            </div>
        </div>
          <div class="container">
            <div class="mini-nav">             
                <a href="#">Public transport</a> 
                <a href="#">Carpooling</a> 
           </div>
                        <div class="info">
                            <h1> <img src="../Resources/Icons/location icon.svg"  > Location</h1>
                            <p>Where are you now?</p>
                        </div>
                        <div class="info">
                            <h1> <img src="../Resources/Icons/destination icon.svg"> Destination</h1>
                            <p>Where are you going?</p>
                        </div>
                        <div class="info">
                            <h1><img src="../Resources/Icons/date icon.svg"> Date</h1>
                            <p>insert date</p>
                        </div>
                        <div class="info">
                            <h1><img src="../Resources/Icons/passengers icon.svg"  > Passengers</h1>
                            <p>Passengers</p>
                        </div>
                        <div class="info">
                            <div class="search">
                                <button class="btn btn1"> Search</button>
                            </div>
                        </div>
                        </div>

                        
        
                   
        
               
          
        <div id="wrap" class="wrap">
            <div class="title">reclamation
                    <button id="hide-btn">
                    <i class="fa fa-minus"></i>
                    </button>
                    <button id="exit-btn">
                    <i class="fa fa-close"></i>
                    </button>
            </div>
            <div name="sources" id="sources" class="custom-select sources" placeholder="sujet">
                <select id="sujet" >
                    <option value="sujet 1">sujet 1</option>
                    <option value="sujet 2">sujet 2</option>
                    <option value="sujet 3">sujet 3</option>
                    <option value="sujet 4">sujet 4</option>
                </select>
                <script>
    document.getElementById("sujet").addEventListener("change", function() {
            var suj = select.options[select.selectedIndex].value;
                     document.cookie = 'su='+suj;
                     alert("x")

};);

</script>
            </div>
            <div class="form">
                <div class="bot-inbox inbox">
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="msg-header">
                        <p>Hello there, how can I help you?</p>
                    </div>
                </div>
                <script>
                     var select = document.getElementById('sujet');
                    var su = select.options[select.selectedIndex].value;
                     document.cookie = 'su='+su;</script>
                <?php $reclamationsc = new reclamationsc();
	        $listereclamations=$reclamationsc->afficher_reclamations();
            foreach($listereclamations as $reclamations){
            if ($reclamations['sujet']==$_COOKIE['su'])
            {
                ?>
                <div class="user-inbox inbox">

                    <button id="mod" class= "mod" type="button"> <i class="fa fa-pencil-square-o"></i></button>
						<input id="h" type="hidden" value=<?PHP echo $reclamations['num_reclamation']; ?> name="num_reclamation">

                    <form method="POST" action="../controller/supprimerreclamation.php">
                    <button id="sup" class="sup" type="submit"> <i class="fa fa-trash-o"></i></button>
						<input type="hidden" value=<?PHP echo $reclamations['num_reclamation']; ?> name="num_reclamation">
					</form>
                    <div  class="msg-header"><p id="re"><?php echo $reclamations['description']?></p></div></div><div class="user-inbox inbox"><div class="date"><p><?php echo $reclamations['date_reclamation']?></p></div></div>
                <div class="user-inbox inbox"></div>
                <?php
            } }?>     
            </div>
            <script>
            document.getElementById("mod").addEventListener("click", function() {
                document.getElementById("data").value=document.getElementById("re").innerHTML; 
                document.getElementById("sen").hidden = false;
}, false);</script> 
          
          
            <div class="typing-field">
                <div class="input-data">
                    <input id="data" type="text" placeholder="Type something here.." size="70" required>
                        <button id="send-btn">Send</button>
                        <button id="sen">Send</button>
                        <script>
             <script>
            $(document).ready(function(){
                                $("#sen").on("click", function(){
                                    var $des = $("#data").val();
                                    var $n = $("#h").val();
                                    
                                    	
                                    
                                    $("#data").val('');
                                   
                                    // start ajax code
                                    $.ajax({
                                        url: '../controller/modifierreclamation.php',
                                        type: 'POST',
                                    data :{description: $des,num_reclamation: $n},
                                        /*data:'description='+$description+'&sujet='+$sujet+'&date_reclamtion='+$date_reclamtion+'&num_reclamation='+$num_reclamation+'&etat='+$etat+'&id_client='+$id_client,*/
                                        
                                        success: function($description){
                                          
                                           
                                        }
                                    });


                                   
                                });
                            });
                        </script>
</script>
                 </div>
            </div>
        </div>




                        <div id="bulle">
                        <button class="bulle" ><i class="fas fa-user"></i></button>       
                        </div>
                        
<script>
  document.getElementById("bulle").hidden = true;
</script>
<script>
  document.getElementById("sen").hidden = true;
</script>
<script>
                            $(document).ready(function(){
                                $("#send-btn").on("click", function(){
                                    var select = document.getElementById('sujet');
                                    var $sujet = select.options[select.selectedIndex].value;
                                    var $description = $("#data").val();
                                    var today = new Date();
                                    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                                    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                                    var $date_reclamtion = date+' '+time;
                                    var $etat = 0;
                                    var $id_client = 1;
                                    if($description !=null){
                                    	
                                    var $msg = '<div class="user-inbox inbox"><button id="mod" class= "mod" type="button"> <i class="fa fa-pencil-square-o"></i></button><input id="h" type="hidden" value=<script></script> name="num_reclamation"><form method="POST" action="../controller/supprimerreclamation.php"><button id="sup" class="sup" type="submit"> <i class="fa fa-trash-o"></i></button><input type="hidden" value=<script></script> name="num_reclamation"></form>';
                                  
                                    $(".form").append($msg);
                                    $("#data").val('');
                                   
                                    // start ajax code
                                    $.ajax({
                                        url: '../controller/ajouterreclamation.php',
                                        type: 'POST',
                                    data :{description: $description,sujet: $sujet,date_reclamtion: $date_reclamtion,etat: $etat,id_client: $id_client},
                                        /*data:'description='+$description+'&sujet='+$sujet+'&date_reclamtion='+$date_reclamtion+'&num_reclamation='+$num_reclamation+'&etat='+$etat+'&id_client='+$id_client,*/
                                        
                                        success: function($description){
                                          
                                           
                                        }
                                    });}


                                   
                                });
                            });
                        </script>

  <script>document.getElementById("hide-btn")
        .addEventListener("click", function() {
  document.getElementById("wrap").hidden = true;
  document.getElementById("bulle").hidden = false;

}, false);</script> 
<script>document.getElementById("exit-btn")
        .addEventListener("click", function() {
  document.getElementById("wrap").hidden = true;
  document.getElementById("bulle").hidden = true;

}, false);</script>
<script>document.getElementById("bulle")
        .addEventListener("click", function() {
  document.getElementById("wrap").hidden =false;
  document.getElementById("bulle").hidden = true;

}, false);</script> 
<script>$(".custom-select").each(function() {
  var classes = $(this).attr("class"),
      id      = $(this).attr("id"),
      name    = $(this).attr("name");
  var template =  '<div class="' + classes + '">';
      template += '<span class="custom-select-trigger">' + $(this).attr("placeholder") + '</span>';
      template += '<div class="custom-options">';
      $(this).find("option").each(function() {
        template += '<span class="custom-option ' + $(this).attr("class") + '" data-value="' + $(this).attr("value") + '">' + $(this).html() + '</span>';
      });
  template += '</div></div>';
  
  $(this).wrap('<div class="custom-select-wrapper"></div>');
  $(this).hide();
  $(this).after(template);
});
$(".custom-option:first-of-type").hover(function() {
  $(this).parents(".custom-options").addClass("option-hover");
}, function() {
  $(this).parents(".custom-options").removeClass("option-hover");
});
$(".custom-select-trigger").on("click", function() {
  $('html').one('click',function() {
    $(".custom-select").removeClass("opened");
  });
  $(this).parents(".custom-select").toggleClass("opened");
  event.stopPropagation();
});
$(".custom-option").on("click", function() {
  $(this).parents(".custom-select-wrapper").find("select").val($(this).data("value"));
  $(this).parents(".custom-options").find(".custom-option").removeClass("selection");
  $(this).addClass("selection");
  $(this).parents(".custom-select").removeClass("opened");
  $(this).parents(".custom-select").find(".custom-select-trigger").text($(this).text());
});</script>

   
    
    
</body>
</html>