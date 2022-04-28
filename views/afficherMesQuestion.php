
<?PHP
include_once '../Model/Question.php';
include_once '../controller/QuestionC.php';
include_once '../controller/ReponseC.php';
include_once '../controller/CategorieC.php';
include_once 'navbar.php';
	$QuestionC=new QuestionC();
    $ReponseC = new ReponseC();
    $CategorieC = new CategorieC();
    $listecategorie=$CategorieC->affichertousCategorie();
	$listeQuestion=$QuestionC->afficherquestion();
    $touslistequestion=$QuestionC->afficherallquestion();
    $somme=$QuestionC->calculerQuestion();
    $sum=$ReponseC->calculerReponse();
  //  $summ1=$ReponseC->calculerReponseQuestion($RefQC);
    if (
		isset($_POST["Search"]) 
    
        )
	 {
        if (
            !empty($_POST["Search"])  
         
        )
        {
   $touslistequestion=$QuestionC->rechercherQuestion($_POST["Search"]);
   $listeQuestion=$QuestionC->rechercherQuestionMeilleur($_POST["Search"]);
        }}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="Ask online Form">
    <meta name="description" content="The Ask is a bootstrap design help desk, support forum website template coded and designed with bootstrap Design, Bootstrap, HTML5 and CSS. Ask ideal for wiki sites, knowledge base sites, support forum sites">
    <meta name="keywords" content="HTML, CSS, JavaScript,Bootstrap,js,Forum,webstagram ,webdesign ,website ,web ,webdesigner ,webdevelopment">
    <meta name="robots" content="index, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <title>Trippie</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <!-- <link href="css/animate.css" rel="stylesheet" type="text/css"> -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"> </head>

<body>
  
    
    <!--======= welcome section on top background=====-->
    <section class="welcome-part-one">
        <div class="container">
            <div class="welcome-demop102 text-center">
                <h2>Welcome to Our Discussion Forum</h2>
                <p>​a meeting at which people can exchange ideas and opinions about a topic. Several well-attended public discussion forums were held in the community.
               
                <div class="button0239-item">
                  
                        <a  type="button" class="join92" href="AjouterQuestion.php">Ask Now</button>
                    </a>
                </div>
                <div class="form-style8292">
                    <div class="input-group"> <span class="input-group-addon"><i class="fa fa-pencil-square" aria-hidden="true"></i></span> </div>
                    <form method="POST">  <input type="text" class="form-control form-control8392" placeholder="Ask any question and you be sure find your answer ?"name="Search">  <div class="publish-button2389">
                    <button type="submit" class="publis1291" name='ajouter' >Search Now</button>
                </div></div></form>  
               
            </div>
        </div>
    </section>
    
    
    <!-- ======content section/body=====-->
    <section class="main-content920">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div id="main">
                        <input id="tab1" type="radio" name="tabs" checked>
                        <label for="tab1">Recent Question</label>
                        <input id="tab2" type="radio" name="tabs">
                       <label for="tab2">All Question</label>
                        <input id="tab3" type="radio" name="tabs">
                        <!-- <label for="tab3">Recently Answered</label>
                        <input id="tab4" type="radio" name="tabs">
                        <label for="tab4">No Answer</label>-->
                        <input id="tab5" type="radio" name="tabs">
                        <label for="tab5">Category</label>
                        <section id="content1">
                               <!--Recent Question Content Section -->
                               <?PHP
				foreach($listeQuestion as $Question){
			?>
                          <div class="question-type2033">
                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="left-user12923 left-user12923-repeat">
                                            <a href="#"><img src="image/images.png" alt="image"> </a> <a href="#"><i class="fa fa-check" aria-hidden="true"></i></a> </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="right-description893">
                                            <div id="que-hedder2983">
                                            <form method="get" action="QuestionDetails.php">
                                            <div id="que-hedder2983">
<h3><a href="QuestionDetails.php?RefQ=<?PHP echo $Question['RefQ']; ?>" target="_blank"><?php echo $Question['TitreQ'];?></a></h3> </div>
<input type="hidden" name="RefQ" value="<?php echo $Question['RefQ'];?>">
<button type="submit" class="q-type238"><i class="fa fa-comment" aria-hidden="true">Details</i></button>

</form>
</div>
                                            <div class="ques-details10018">
                                                <p><?PHP echo $Question['DesQ']; ?></p>
                                            </div>
                                            <hr>
                                            <div class="ques-icon-info3293"> <a href="#"><i class="fa fa-folder" aria-hidden="true"> Details</i></a> <a href="#"><i class="fa fa-clock-o" aria-hidden="true"><?PHP echo $Question['Date_publication']; ?></i></a> <a href="#"><i class="fa fa-question-circle-o" aria-hidden="true"> <?PHP echo $Question['RefQ']; ?></i></a> <a href="#"><i class="fa fa-bug" aria-hidden="true"> Report</i></a>
                                            <form method="POST" action="supprimerQuestion.php"><button type="submit" class="q-type23 button-ques2973" ><i class="fa fa-trash" aria-hidden="true"></i></button><input type="hidden" value=<?PHP echo $Question['RefQ']; ?> name="RefQ"></form></div>
                                            <a href="modifierQuestion.php?RefQ=<?PHP echo $Question['RefQ']; ?>" ><i class="fa fa-edit" style="font-size: 26px;"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="ques-type302">
                                            <a href="#">
                                                <button type="button" class="q-type238"><i class="fa fa-comment" aria-hidden="true"><?php  $summ1=$ReponseC->calculerReponseQuestion($Question['RefQ']); foreach($summ1 as $row1) {    echo "<td>" . $row1 . "</td>"; } ?>   answer</i></button>
                                            </a>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?PHP
				}
			?>
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                  <li>
                                    <a href="#" aria-label="Previous">
                                      <span aria-hidden="true">&laquo;</span>
                                    </a>
                                  </li>
                                  <li><a href="#">1</a></li>
                                  <li><a href="#">2</a></li>
                                  <li><a href="#">3</a></li>
                                  <li><a href="#">4</a></li>
                                  <li><a href="#">5</a></li>
                                  <li>
                                    <a href="#" aria-label="Next">
                                      <span aria-hidden="true">&raquo;</span>
                                    </a>
                                  </li>
                                </ul>
                              </nav>
                        </section>
                        <!--  End of content-1------>
                        
                        <section id="content2">
                           <!--All question Content Section -->
                           <?PHP
				foreach($touslistequestion as $Question){
			?>
                             <div class="question-type2033">
                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="left-user12923 left-user12923-repeat">
                                            <a href="#"><img src="image/images.png" alt="image"> </a> <a href="#"><i class="fa fa-check" aria-hidden="true"></i></a> </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="right-description893">
                                            <div id="que-hedder2983">
                                            <form method="get" action="QuestionDetails.php">
                                            <div id="que-hedder2983">
<h3><a href="QuestionDetails.php" target="_blank"><?php echo $Question['TitreQ'];?></a></h3> </div>
<input type="hidden" name="RefQ" value="<?php echo $Question['RefQ'];?>">
<button type="submit" class="q-type238"><i class="fa fa-comment" aria-hidden="true">Details</i></button>

</form>
</div>
                                            <div class="ques-details10018">
                                                <p><?PHP echo $Question['DesQ']; ?></p>
                                            </div>
                                            <hr>
                                            <div class="ques-icon-info3293"> <a href="#"><i class="fa fa-folder" aria-hidden="true"> Details</i></a> <a href="#"><i class="fa fa-clock-o" aria-hidden="true"><?PHP echo $Question['Date_publication']; ?></i></a> <a href="#"><i class="fa fa-question-circle-o" aria-hidden="true"> <?PHP echo $Question['RefQ']; ?></i></a> <a href="#"><i class="fa fa-bug" aria-hidden="true"> Report</i></a>
                                            <form method="POST" action="supprimerQuestion.php"><button type="submit" class="q-type23 button-ques2973" ><i class="fa fa-trash" aria-hidden="true"></i></button><input type="hidden" value=<?PHP echo $Question['RefQ']; ?> name="RefQ"></form></div>
                                            <a href="modifierQuestion.php?RefQ=<?PHP echo $Question['RefQ']; ?>" ><i class="fa fa-edit" style="font-size: 26px;"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="ques-type302">
                                            <a href="#">
                                                <button type="button" class="q-type238"><i class="fa fa-comment" aria-hidden="true"> <?php  $summ1=$ReponseC->calculerReponseQuestion($Question['RefQ']); foreach($summ1 as $row1) {    echo "<td>" . $row1 . "</td>"; }?>answer </i></button>
                                            </a>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?PHP
				}
			?>
                            
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                  <li>
                                    <a href="#" aria-label="Previous">
                                      <span aria-hidden="true">&laquo;</span>
                                    </a>
                                  </li>
                                  <li><a href="#">1</a></li>
                                  <li><a href="#">2</a></li>
                                  <li><a href="#">3</a></li>
                                  <li><a href="#">4</a></li>
                                  <li><a href="#">5</a></li>
                                  <li>
                                    <a href="#" aria-label="Next">
                                      <span aria-hidden="true">&raquo;</span>
                                    </a>
                                  </li>
                                </ul>
                              </nav>                        
                        </section>
                        
                  
                        
               
                        
                    
                              
                        <section id="content5">
                              <!--Recent Question Content Section -->
                              <?PHP
				foreach($listecategorie as $Categorie){
			?>
                            <div class="question-type2033">
                                <div class="row">
                             
                                    <div class="col-md-9">
                                        <div class="right-description893">
                                            <div id="que-hedder2983">
                                               
                     <h3><a href="categorydetails.php?idC=<?PHP echo $Categorie['idC']; ?>" target="_blank"><?php echo $Categorie['ncateg'];?></a></h3> </div>
                                            
                                            <div class="ques-details10018">
                                            <?php echo $Categorie['descateg'];?>
                                            </div>
                                            <hr>
                                          
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <?PHP
				}
			?>      
                            <!--End of content-5-->
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                  <li>
                                    <a href="#" aria-label="Previous">
                                      <span aria-hidden="true">&laquo;</span>
                                    </a>
                                  </li>
                                  <li><a href="#">1</a></li>
                                  <li><a href="#">2</a></li>
                                  <li><a href="#">3</a></li>
                                  <li><a href="#">4</a></li>
                                  <li><a href="#">5</a></li>
                                  <li>
                                    <a href="#" aria-label="Next">
                                      <span aria-hidden="true">&raquo;</span>
                                    </a>
                                  </li>
                                </ul>
                              </nav>
                        </section>
               
                    </div>
                </div>
                <!--end of col-md-9 -->
                <!--strart col-md-3 (side bar)-->
                <aside class="col-md-3 sidebar97239">
                    <div class="status-part3821">
                        <h4>stats</h4> <a href="#"><i class="fa fa-question-circle" aria-hidden="true"> Question(<?php foreach($somme as $row) {    echo "<td>" . $row . "</td>";
      
        } ?>)</i></a> <i class="fa fa-comment" aria-hidden="true"> Answers(<?php foreach($sum as $row) {    echo "<td>" . $row . "</td>";
      
        } ?>)</i> </div>
                    <div class="categori-part329">
                        <h4>Category</h4>
                        <ul>
                        <?PHP
				foreach($listecategorie as $Categorie){
			?>
                            <li><a href="#"><?php echo $Categorie['ncateg'];?></a></li>
                           <?php }?>
                        </ul>
                    </div>
                    <!--             social part -->
                    <div class="social-part2189">
                        <h4>Find us</h4>
                        <li class="rss-one">
                            <a href="#" target="_blank"> <strong>
<span>Subscribe</span>
<i class="fa fa-rss" aria-hidden="true"></i>

<br>
<small>To RSS Feed</small>

</strong> </a>
                        </li>
                        <li class="facebook-two">
                            <a href="#" target="_blank"> <strong>
<span>Subscribe</span>
<i class="fa fa-facebook" aria-hidden="true"></i>

<br>
<small>To Facebook Feed</small>

</strong> </a>
                        </li>
                        <li class="twitter-three">
                            <a href="#" target="_blank"> <strong>
<span>Subscribe</span>
<i class="fa fa-twitter" aria-hidden="true"></i>

<br>
<small>To twitter Feed</small>

</strong> </a>
                        </li>
                        <li class="youtube-four">
                            <a href="#" target="_blank"> <strong>
<span>Subscribe</span>
<i class="fa fa-youtube" aria-hidden="true"></i>

<br>
<small>To youtube Feed</small>

</strong> </a>
                        </li>
                    </div>
                    <!--              login part-->
                    <div class="login-part2389">
                        <h4>Login</h4>
                        <div class="input-group300"> <span><i class="fa fa-user" aria-hidden="true"></i></span>
                            <input type="text" class="namein309" placeholder="Username"> </div>
                        <div class="input-group300"> <span><i class="fa fa-lock" aria-hidden="true"></i></span>
                            <input type="password" class="passin309" placeholder="Name"> </div>
                        <a href="#">
                            <button type="button" class="userlogin320">Log In</button>
                        </a>
                        <div class="rememberme">
                            <label>
                                <input type="checkbox" checked="checked"> Remember Me</label> <a href="#" class="resbutton3892">Register</a> </div>
                    </div>
                
                    <!--          start tags part-->
                    <div class="tags-part2398">
                        <h4>Tags</h4>
                        <ul>
                            <li><a href="#">analytics</a></li>
                            <li><a href="#">Computer</a></li>
                            <li><a href="#">Developer</a></li>
                            <li><a href="#">Google</a></li>
                            <li><a href="#">Interview</a></li>
                            <li><a href="#">Programmer</a></li>
                            <li><a href="#">Salary</a></li>
                            <li><a href="#">University</a></li>
                            <li><a href="#">Employee</a></li>
                        </ul>
                    </div>
                    <!--          End tags part-->
                    <!--        start recent post  -->
                    <div class="recent-post3290">
                        <h4>Recent Post</h4>
                        <div class="post-details021"> <a href="#"><h5>How much do web developers</h5></a>
                            <p>I am thinking of pursuing web developing as a career & was ...</p> <small style="color: #848991">July 16, 2017</small> </div>
                        <hr>
                        <div class="post-details021"> <a href="#"><h5>How much do web developers</h5></a>
                            <p>I am thinking of pursuing web developing as a career & was ...</p> <small style="color: #848991">July 16, 2017</small> </div>
                        <hr>
                        <div class="post-details021"> <a href="#"><h5>How much do web developers</h5></a>
                            <p>I am thinking of pursuing web developing as a career & was ...</p> <small style="color: #848991">July 16, 2017</small> </div>
                    </div>
                    <!--       end recent post    -->
                </aside>
            </div>
        </div>
    </section>
    <!--    footer -->
    <div class="footer-search">
        <div class="container">
            <div class="row">
                <div id="custom-search-input">
                    <div class="input-group col-md-12"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        <input type="text" class="  search-query form-control user-control30" placeholder="Search here...." /> <span class="input-group-btn">
    <button class="btn btn-danger" type="button">
        <span class=" glyphicon glyphicon-search"></span> </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="footer-part">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="info-part-one320">
                        <h4>Where We Are ?</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi adipiscing gravida odio, sit amet suscipit risus ultrices eu.</p>
                        <h4>Address :</h4>
                        <p>Ask Me Network, 33 Street, syada
                            <br> Zeinab, Cairo, Egypt.</p>
                        <h4>Support :</h4>
                        <p>Support Telephone No : (+2)01111011110</p>
                        <p>Support Email Account : </p>
                        <p>info@example.com</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info-part-two320">
                        <h4>Quick Links</h4>
                        <a href="#">
                            <p>-Home</p>
                        </a>
                        <a href="#">
                            <p>-Ask Question</p>
                        </a>
                        <a href="#">
                            <p>-Questions</p>
                        </a>
                        <a href="#">
                            <p>-Users</p>
                        </a>
                        <a href="#">
                            <p>-Edit Profile</p>
                        </a>
                        <a href="#">
                            <p>-Page</p>
                        </a>
                        <a href="#">
                            <p>-Contact Us</p>
                        </a>
                        <a href="#" class="last-child12892">
                            <p>-Buy now</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info-part-three320">
                        <h4>Popular Questions</h4>
                        <div class="news-info209">
                            <h5>Why are the British confused</h5>
                            <p>(Why I darest say, they darest not get offended when they so ...</p> <small>July 16, 2017</small> </div>
                        <div class="news-info209">
                            <h5>How to approach applying for</h5>
                            <p>(I am trying to find/change my career trajectory. Its a good cozy ...</p> <small>July 16, 2017</small> </div>
                        <div class="news-info209">
                            <h5>How to evaluate whether a</h5>
                            <p>A friend of mine is the CEO of his own small business. ...</p> <small>July 16, 2017</small> </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info-part-four320">
                        <h4>Latest Tweets</h4>
                        <div class="tweet-details29">
                            <p><i class="fa fa-twitter-square" aria-hidden="true"></i><a href="#"> codeThemesCheck a new update #AskMe #ThemeForest #WordPress #2code #Envato#2code
Themehttps://t.co/urb3LgsOCi</a></p> <small>about 2 weeks ago</small> </div>
                        <div class="tweet-details29">
                            <p><i class="fa fa-twitter-square" aria-hidden="true"></i><a href="#"> codeThemesCheck a new update #AskMe #ThemeForest #WordPress #2code #Envato#2code
Themehttps://t.co/urb3LgsOCi</a></p> <small>about 2 weeks ago</small> </div>
                        <div class="tweet-details29">
                            <p><i class="fa fa-twitter-square" aria-hidden="true"></i><a href="#"> codeThemesCheck a new update #AskMe #ThemeForest #WordPress #2code #Envato#2code
Themehttps://t.co/urb3LgsOCi</a></p> <small>about 2 weeks ago</small> </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="footer-social">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>Copyright 2022 Trippie | <strong>Trippie</strong></p>
                </div>
                <div class="col-md-6">
                    <div class="social-right2389"> <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a> </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>