<title>Justin Franzen</title>
<?php
include 'includes/header.php';
?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!---<script>
        
        $(document).ready(function(){
          // Add smooth scrolling to all links
          $(".scroll").on('click', function(event) {

            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
              // Prevent default anchor click behavior
              event.preventDefault();

              // Store hash
              var hash = this.hash;

              // Using jQuery's animate() method to add smooth page scroll
              // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
              $('html, body').animate({
                scrollTop: $(hash).offset().top
              }, 1000, function(){

                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
              });
            } // End if
          });
        });
        
    </script>---->

<?php
if (isset($_POST['submitted'])){
    
    require_once('sql/mysql_connect.php');
    
        $firstname = mysqli_real_escape_string($dbc, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($dbc, $_POST['lastname']);
        $email = mysqli_real_escape_string($dbc, $_POST['email']);
        $message = mysqli_real_escape_string($dbc, $_POST['message']);
        $redirect = 'index.php#contact';
    
        // form validation
        $errors = array();
    
        if (empty($firstname)) 
            {
                echo '<script>window.location = "'. $redirect .'";</script>'; 
                $errors['firstname'] = "First name required";
            }
        else if (!preg_match("/^[a-zA-Z ]*$/", $firstname))
            {
                echo '<script>window.location = "'. $redirect .'";</script>'; 
                $errors['valid_firstname'] = "Valid first name required";
            }
        else if (empty($lastname))
             {
                echo '<script>window.location = "'. $redirect .'";</script>'; 
                $errors['lastname'] = "Last name required";
            }
        else if (!preg_match("/^[a-zA-Z ]*$/", $lastname))
            {
                echo '<script>window.location = "'. $redirect .'";</script>'; 
                $errors['valid_lastname'] = "Valid last name required";
            }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                echo '<script>window.location = "'. $redirect .'";</script>'; 
                $errors['email'] = "Valid email required";
            }
        /*if (empty($message))
            {
                echo '<script>window.location = "'. $redirect .'";</script>'; 
                $errors['message'] = "Message required";
            }*/
        else
            {
          $sql = "INSERT INTO portfolio (firstname, lastname, email, message)
                VALUES ('$firstname', '$lastname', '$email', '$message')";
            
            mysqli_query($dbc, $sql);
            
          $url='thankyou.php';
  
          echo '<script>window.location = "'.$url.'";</script>';
              
         $email_to = "jtfranz90@gmail.com";
         $email_from = "justin@justinfranzen.com";
         $subject = "Client Request";
         $content = $firstname . " " . $lastname . " is interested in web design services" . " \nEmail: " . " " . $email . " " . " \n " . $message;
         mail($email_to, $subject, $content);
            }  
    
    //end form validation
  
}   


?>

<body>
    
<h1 id="name">Justin Franzen<br>
    <span class="title">Web Developer<br>Ninja</span></h1>
    
<!--<div id="bgimg-name"></div>-->

<div id="mobile-background-color">
    
    <div id="mobile-background"></div>
    
</div>

<div id="video-background-color"></div>
    
<div id="video">
    <video autoplay muted loop id="myVideo">
      <source src="martial_arts.mp4" type="video/mp4">
    </video>
</div>

<!---<div class="row home">
    
    <h1 id="main-title">Justin Franzen</h1>
    
    <div class="col-lg-4 col-md-4 col-sm-12 column">
    
        <div id="portfolio-about">
        
            <h2 class="section-title">About Me</h2>
            
            <p>I’m a mostly self taught web developer. I graduated from UW-Milwaukee in December of 2016 with a Bachelors in Information Science & Technology. Before attending UW-Milwaukee, I also attended Waukesha County Technical College where I received my Associates in Marketing. I also took some web design classes and started my coding education as well...<a href="#">Learn More</a></p>
        
        
        </div>
    
    
    </div>
    
    <div class="col-lg-4 col-md-4 col-sm-12 column">
    
        <div id="portfolio-portfolio">

            <h2 class="section-title">My Work</h2>
            
            <img src="village-bowl.jpg" alt="Village Bowl" class="portfolio" />
            
            <img src="atkd.jpg" alt="ATKD" class="portfolio" />
            
            <img src="brookfield-chiropractic.jpg" alt="Brookfield Chiropractic" class="portfolio" />
        
        </div>
    
    </div>
    
    <div class="col-lg-4 col-md-4 col-sm-12 column">
    
        <div id="portfolio-contact">
        
            <h2 class="section-title">Contact</h2>
            
            <img src="contact-form.jpg" alt="Contact Form" id="contact-form" />
            
        </div>
    
    </div>
    
</div>--->
    
<div id="content">
        
<div class="section">
    
    <div id="about"></div>
        
    <h2>About Me</h2>
    
    <div class="line"></div>
    
    <div class="row">
        
          <div class="col-lg-4 col-md-4 col-sm-12">
        
            <img src="images/justin.jpg" alt="Justin Franzen" id="justin" />
        
        </div>
        
        <div class="col-lg-8 col-md-8 col-sm-12">
        
            <p class="bio">I’m a mostly self taught web developer.  I graduated from UW-Milwaukee in December of 2016 with a Bachelors in Information Science &amp; Technology.  Before attending UW-Milwaukee, I also attended Waukesha County Technical College where I received my Associates in Marketing.  I also took some web design classes and started my coding education as well.</p>

             <p class="bio">I was stronger in HTML and CSS when I started the Web &amp; Digital Media Design program at WCTC.  I also took some JavaScript and PHP classes, however, I struggled to understand the syntax and logic behind it.  As a result, I focused more on the design aspects of creating websites.  </p>

             <p class="bio">Fortunately, while attending UW-Milwaukee, my understanding of coding (JavaScript and PHP) improved.  I was able to understand and apply what I was unable to in my previous classes.  Although my design skills were still stronger, I was also able to apply more interactivity throughout my sites using JavaScript and PHP.  </p>
            
        </div>
    
    </div>

    <p>All of my work has been self taught after graduating.  If I’m unable to figure something out whether it be design or coding, I research any methods that might work and go from there.  Trial and error has taught me what to do and what to stay away from.  Being mostly self taught has helped me further understand the development side and how to problem solve better.  
The code for all of my work can be viewed on my <a href="https://github.com/justinfranzen" target="_blank" id="github">github</a> profile.  Most of my current work involves HTML, CSS, PHP, MySQL and some JavaScript (including JQuery).</p>

    <br>    
        
    <div class="row facts">
        
        <div class="col-lg-6 col-md-6 col-sm-12">
        
            <h3>Skills</h3>
                <?php
                /*
                $skills = array('HTML (strongest)', 'CSS (strongest)', 'Bootstrap', 'PHP', 'MySQL','JavaScript (basic knowledge)', 'JQuery (basic knowledge)');  

                    for($i = 0; $i<count($skills); $i++)
                    {
                        echo "<li> {$skills[$i]} </li>";
                    }
                */
                ?>
            
            <div class="row">
            
                <div class="col-lg-6 col-md-6 col-sm-12">
                
                    <p id="skillsSection"></p>

                    <script>

                    var skills = ["HTML", "CSS", "SCSS", "Bootsrap", "Basic PHP"];
                    var text = "";
                    var i;
                    for (i = 0; i < skills.length; i++) {
                        text += "<li>" + skills[i] + "</li> "+ "<br>";
                    }
                        
                        document.getElementById("skillsSection").innerHTML = text;

                    </script>
                    
                </div>
                    
                 <div class="col-lg-6 col-md-6 col-sm-12">

                    <p id="skillsSection2"></p> 

                    <script>

                    var skills2 = ["MySQL", "Git", "Basic JavaScript", "Basic JQuery", '<div id="wordpress">WordPress (Divi, Avada)</div>'];
                    var text2 = "";
                    var i;
                    for (i = 0; i < skills2.length; i++) {
                        text2 += "<li>" + skills2[i] + "</li> "+ "<br>";
                    }

                    document.getElementById("skillsSection2").innerHTML = text2;
                
                     </script>
                     
                </div>
                
            </div>
            
        </div>      
        
        <div class="col-lg-6 col-md-6 col-sm-12">
    
            <h3>Interesting Facts</h3>

                    <?php
                
                    $facts = array('Avid volleyball player', 'Bowler', 'Taekwondo 2nd degree black belt');  

                    for($i = 0; $i < count($facts); $i++)
                    {
                        echo "<li> {$facts[$i]} </li>";
                    }
                ?>
            
        </div>
    
    </div>
    
</div>
    

<div class="section2">
    
    <div class="section2-content">
    
    <div id="work"></div>
    
    <h2>Portfolio</h2>

      <div class="line"></div>
    
    <br>
    
    <div class="row centered">

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <figure>
                    <a href="http://justinfranzen.com/village-bowl" target="_blank"><img src="images/village-bowl.jpg" alt="Village Bowl Menomonee Falls" width="600" class="site" onmouseover="imgResize(this)" onmouseout="normalImg(this)"/></a>
                        <figcaption>
                            <a href="https://www.villagebowl.com/" target="_blank" class="weblink">Original Website</a>
                        </figcaption>
                </figure>
            </div>

             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                 <figure>
                     <a href="http://justinfranzen.com/atkd" target="_blank"><img src="images/atkd.jpg" alt="American Taekwondo" width="600" class="site" onmouseover="imgResize(this)" onmouseout="normalImg(this)"/></a>
                        <figcaption>
                            <a href="https://www.atkd.com/" target="_blank" class="weblink">Original Website</a>
                        </figcaption>
                </figure>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <figure>
                        <a href="http://justinfranzen.com/brookfield-chiropractic/" target="_blank"><img src="images/brookfield-chiropractic.jpg" alt="Brookfield Chiropractic" width="600" class="site" onmouseover="imgResize(this)" onmouseout="normalImg(this)"/></a>
                        <figcaption>
                            <a href="https://www.brookfieldchiropractic.net/" target="_blank" class="weblink">Original Website</a>
                        </figcaption>
                    </figure>
            </div>
            
    </div>

    <div class="row centered">

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <figure>
                <a href="http://justinfranzen.com/surge/index.php" target="_blank"><img src="images/surge.jpg" alt="Surge Martial Arts" width="600" class="site one" onmouseover="imgResize(this)" onmouseout="normalImg(this)"/></a>
                   <figcaption>
                       <a href="http://surgemartialarts.com/" target="_blank" class="weblink">Original Website</a>
                   </figcaption>
            </figure>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <figure>
                 <a href="http://justinfranzen.com/acubalance/index.php" target="_blank"><img src="images/acubalance.jpg" alt="Acubalance LLC" width="600" class="site" onmouseover="imgResize(this)" onmouseout="normalImg(this)"/></a>
                    <figcaption>
                     <a href="http://www.acubalancellc.com/Home.html" target="_blank" class="weblink">Original Website</a>
                        <br>
                      <a href="http://justinfranzen.com/wordpress/home/" target="_blank" class="weblink">WordPress Version</a>
                    </figcaption>
            </figure>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <figure>
                 <a href="http://justinfranzen.com/new-berlin/index.php" target="_blank"><img src="images/new-berlin.jpg" alt="New Berlin Bowl & Ale House" width="600" class="site" onmouseover="imgResize(this)" onmouseout="normalImg(this)"/></a>
                    <figcaption>
                       <a href="http://newberlinalehouse.com/Bowling.html" target="_blank" class="weblink">Original Website</a> 
                    </figcaption>
            </figure>
        </div>

    </div>


        <div class="row centered">

             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <figure>
                    <a href="http://justinfranzen.com/legacy/index.php" target="_blank"><img src="images/legacy.jpg" alt="Legacy Martial Arts" width="600" class="site" onmouseover="imgResize(this)" onmouseout="normalImg(this)"/></a>
                        <figcaption>
                             Original website expired 
                        </figcaption>
                </figure>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <figure>
                    <a href="http://justinfranzen.com/greenfield_highlands/index.php" target="_blank"><img src="images/greenfield-highlands.jpg" alt="Greenfield Highlands Luxury Apartments" width="600" class="site" onmouseover="imgResize(this)" onmouseout="normalImg(this)"/></a>
                        <figcaption>
                             <a href="https://www.thegreenfieldhighlands.com/" target="_blank" class="weblink">Original Website</a> <br>
                            <a href="http://justinfranzen.com/wordpress/greenfield-highlands/home/" target="_blank" class="weblink">WordPress Version</a>
                        </figcaption>
                </figure>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <figure>
                    <a href="http://justinfranzen.com/pops/index.php" target="_blank"><img src="images/pops.jpg" alt="Pop's Custard" width="600" class="site" onmouseover="imgResize(this)" onmouseout="normalImg(this)"/></a>
                        <figcaption>
                            <a href="https://popscustard.com/" target="_blank" class="weblink">Original website</a>
                        </figcaption>
                </figure>
            </div>

        </div>

        <div class="row centered">

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <figure>
                    <a href="http://justinfranzen.com/martialarts/" target="_blank"><img src="images/martial-arts.jpg" alt="Martial Arts" width="600" class="site" onmouseover="imgResize(this)" onmouseout="normalImg(this)"/></a>
                        <figcaption>
                            
                        </figcaption>
                </figure>
            </div>

             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <figure>
                    <a href="http://justinfranzen.com" target="_blank"><img src="images/justinfranzen.jpg" alt="Justin Franzen" width="600" class="site" onmouseover="imgResize(this)" onmouseout="normalImg(this)"/></a>
                    <figcaption>

                    </figcaption>
                </figure>
                </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <figure>
                        <a href="http://justinfranzen.com/cleveland-fire/" target="_blank"><img src="images/cf.jpg" alt="Cleveland Fire Dept" width="600" class="site" onmouseover="imgResize(this)" onmouseout="normalImg(this)"/></a>
                            <figcaption>
                                <a href="http://www.clevelandfire.org/" target="_blank" class="weblink">Original Website</a> 
                        </figcaption>
                    </figure>
            </div>
            
        </div>
    </div>
    
</div>
    
    <div id="contact">
    
        <h2 id="contact-title">Contact</h2>

        <div class="line"></div>
        
    <div class="content">

       <div class="row contact">

           <div id="contact-info">

                <div class="col-lg-6 col-md-12 col-sm-12">

                <p>Contact me with any questions by email or submitting the form.</p>
                <span class="glyphicon glyphicon-envelope"></span><a href="mailto:jtfranz90@gmail.com" id="email">jtfranz90@gmail.com</a>

                    <br><br>

                <p>View my LinkedIn and my projects on GitHub</p>

                    <div id="contact-icons">

                        <a href="https://www.linkedin.com/in/justin-franzen-240413137" target="_blank"><i class="fa fa-linkedin-square linkedin contact-icon" aria-hidden="true"></i>
                     </a>

                     <a href="https://www.github.com/justinfranzen" target="_blank"><i class="fa fa-github github contact-icon" aria-hidden="true"></i>
                     </a>

                    </div>

               </div>

           </div>

             <div class="col-lg-6 col-md-12 col-sm-12">

                    <form id="myForm" action="index.php#contact" method="post">
                        
                    <div class="row">
                        
                        <div class="col-lg-6 col-md-6 col-sm-12">

                             <label for="fname">First Name *</label><input type="text" name="firstname" onfocus = "colorChange(this)" onfocusout = "focusOut(this)" size="14" placeholder="First Name" value="<?php if(isset($_POST['firstname'])) echo $_POST['firstname'];?>">
                             <p class="error"><?php if(isset($errors['firstname'])) echo $errors['firstname']; ?></p>
                             <p class="error"><?php if(isset($errors['valid_firstname'])) echo $errors['valid_firstname']; ?></p>

                        </div>
                        
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            
                              <label for="lname">Last Name *</label><input type="text" name="lastname" onfocus = "colorChange(this)" onfocusout = "focusOut(this)" size="14" placeholder="Last Name" value="<?php if(isset($_POST['lastname'])) echo $_POST['lastname'];?>">
                              <p class="error"><?php if(isset($errors['lastname'])) echo $errors['lastname']; ?></p>
                              <p class="error"><?php if(isset($errors['valid_lastname'])) echo $errors['valid_lastname']; ?></p>
                            
                        </div>
                        
                    </div>
                        
                      <label for="email">Email *</label><input type="email" name="email" onfocus = "colorChange(this)" onfocusout = "focusOut(this)" placeholder="Email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>">
                     <p class="error"><?php if(isset($errors['email'])) echo $errors['email']; ?></p>

                     <label for="message">Message</label>
                     <textarea rows="5" style="width:100%" onfocus = "colorChange(this)" onfocusout = "focusOut(this)" name="message" placeholder="Message"></textarea><br>
                         <p class="error"><?php if(isset($errors['message'])) echo $errors['message']; ?></p>

                   <br>
                   <br>
                    <p align="center"><input type="submit" value="Send" name="Submit" id="submit">
                        <input type="hidden" name="submitted" value="TRUE" /></p>
                </form> 

            </div>
           
        </div>
           
        </div>
        
</div>
    
</div>
    
</body>  



