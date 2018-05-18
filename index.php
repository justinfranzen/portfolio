<title>Justin Franzen</title>
<?php
include 'includes/header.php';
?>


<script>

 function colorChange(x) {
     x.style.backgroundColor = "white";
 }
    
function focusOut(x) {
    x.style.backgroundColor = "#dae6f0";
}
    
$("#main-nav a").click(function(){
    var divID = $(this).attr("href");
    $("body").animate({scrollTop: $(divID).offset().top}, "slow");
    return false;
});

</script>

<?php
if (isset($_POST['submitted'])){
    
    require_once('sql/mysql_connect.php');
    
        $firstname = mysqli_real_escape_string($dbc, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($dbc, $_POST['lastname']);
        $email = mysqli_real_escape_string($dbc, $_POST['email']);
        $phonenumber = mysqli_real_escape_string($dbc, $_POST['phone']);
        $message = mysqli_real_escape_string($dbc, $_POST['message']);
        $redirect = 'index.php#contact';
    
        // form validation
        $errors = array();
    
        if (empty($firstname)) 
            {
                echo '<script>window.location = "'. $redirect .'";</script>'; 
                $errors['firstname'] = "First name required";
            }
        elseif (!preg_match("/^[a-zA-Z]*$/", $firstname))
            {
                echo '<script>window.location = "'. $redirect .'";</script>'; 
                $errors['valid_firstname'] = "Valid first name required";
            }
        elseif (empty($lastname))
             {
                echo '<script>window.location = "'. $redirect .'";</script>'; 
                $errors['lastname'] = "Last name required";
            }
        elseif (!preg_match("/^[a-zA-Z]*$/", $lastname))
            {
                echo '<script>window.location = "'. $redirect .'";</script>'; 
                $errors['valid_lastname'] = "Valid last name required";
            }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                echo '<script>window.location = "'. $redirect .'";</script>'; 
                $errors['email'] = "Valid email required";
            }
        elseif (empty($message))
            {
                echo '<script>window.location = "'. $redirect .'";</script>'; 
                $errors['message'] = "Message required";
            }
        else
            {
          $sql = "INSERT INTO portfolio (firstname, lastname, email, message)
                VALUES ('$firstname', '$lastname', '$email', '$message')";
            
            mysqli_query($dbc, $sql);
            
          $url='thankyou.php';
  
          echo '<script>window.location = "'.$url.'";</script>';
              
         $email_to = "jtfranz90@gmail.com";
         $email_from = "mail.justinfranzen.com";
         $subject = "Client Request";
         $content = $firstname . " " . $lastname . " is interested in web design services" . " \nEmail: " . " " . $email . " " . " \n " . $message;
         mail($email_to, $subject, $content);
            }  
    
    //end form validation
  
}   


?>

<body> 
    
<div id="content">
        
<div class="section">
    
    <div id="about"></div>
        
    <h2>About Me</h2>
    
    <div class="line"></div>
    
    <div class="row">
        
        <div class="col-lg-8 col-md-8 col-sm-12">
        
            <p>I first learned about web design in high school.  It wasn't much experience or hands on learning, however, it's where my interest was first sparked.  I attended  Waukesha County Technical College from 2008 to 2013.  I first received my Associate's degree in Marketing.  While I was taking courses for that degree, I took a few web design classes which is when my interest for web design grew immensely.  After finishing my Marketing degree, I went into the Web &amp; Digital Media Design program where both my web design and development skills truly began to grow.</p>

                <br>

             <p>While attending WCTC, I learned the basics of web design and good practices that of course have changed over the years.  Within my courses, I was taught how to work with other individuals as a team to create a website based on a client's needs and wants.  In addition to the design aspect, I also began to learn PHP and JavaScript. I utilized PHP and JavaScript throughout several small projects.  I did have my difficulties as anyone might have, however, this is where my desire to better understand other languages grew. </p>
            
        </div>
        
        <div class="col-lg-4 col-md-4 col-sm-12">
        
            <img src="images/me.jpg" alt="Justin Franzen" id="justin" />
        
        </div>
    
    </div>

                <br>

             <p>After attending WCTC, I chose to continue my education at UW-Milwaukee in the Information Science &amp; Technology program with a focus in Web Design and Development.  Through additional web design courses, I was able to update my skills and learn the most up-to-date design practices.  In addition, I was able to refresh and expand my knowledge of additional languages including PHP, C#, and MYSQL.  I used both design and development to create small projects that have lead me to where I am today.  My strengths are definitely stronger in design (HTML and CSS), however, I do involve as many development aspects as I can where applicable. </p>

                <br>

            <p>My passion is creating websites whether it be through design or development. I enjoy seeing my work look and function correctly including the design aspect or development aspect.  Whether I spend 10 hours or 10 minutes on a task, I absolutely love the feeling of seeing my work displayed and functioning correctly.  My goal is to have the privelege of working for a company that creates websites through design or development with the latest technologies for all types of clients.</p>

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
            
            <p id="skillsSection"></p>

            <script>
                
            var skills = ["HTML", "CSS", "Bootsrap", "Basic PHP", "MySQL", "Basic JavaScript", "Basic JQuery"];
            var text = "";
            var i;
            for (i = 0; i < skills.length; i++) {
                text += "<li>" + skills[i] + "</li> "+ "<br>";
            }
            document.getElementById("skillsSection").innerHTML = text;
                
            </script>
            
        </div>      
        
        <div class="col-lg-6 col-md-6 col-sm-12">
    
            <h3>Random Facts</h3>

                    <?php
                
                $facts = array('Avid volleyball player', 'Bowler', 'Taekwondo 1st degree black belt');  

                    for($i = 0; $i<count($facts); $i++)
                    {
                        echo "<li> {$facts[$i]} </li>";
                    }
                ?>
            
        </div>
    
    </div>
    
</div>
    

<div class="section2">
    
    <div id="work"></div>
    
    <h2>Portfolio</h2>

      <div class="line"></div>
    
    <br>
    
    <div class="row centered">

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <figure>
                    <a href="http://justinfranzen.com/brookfield-chiropractic/" target="_blank"><img src="images/brookfield-chiropractic.jpg" alt="Brookfield Chiropractic" width="600" class="site" onmouseover="imgResize(this)" onmouseout="normalImg(this)"/></a>
                        <figcaption>
                            <a href="https://www.brookfieldchiropractic.net/" target="_blank" class="weblink">Original Website</a>
                        </figcaption>
                </figure>
            </div>

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
                        </figcaption>
                    </figure>
            </div>
            
    </div>

    <div class="row centered">

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <figure>
                 <a href="http://justinfranzen.com/new-berlin/index.php" target="_blank"><img src="images/new-berlin.jpg" alt="New Berlin Bowl & Ale House" width="600" class="site" onmouseover="imgResize(this)" onmouseout="normalImg(this)"/></a>
                    <figcaption>
                       <a href="http://newberlinalehouse.com/Bowling.html" target="_blank" class="weblink">Original Website</a> 
                    </figcaption>
            </figure>
        </div>

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
                             <a href="https://www.thegreenfieldhighlands.com/" target="_blank" >Original Website</a> 
                        </figcaption>
            </figure>
        </div>

    </div>


        <div class="row centered">

             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <figure>
                    <a href="http://justinfranzen.com/pops/index.php" target="_blank"><img src="images/pops.jpg" alt="Pop's Custard" width="600" class="site" onmouseover="imgResize(this)" onmouseout="normalImg(this)"/></a>
                        <figcaption>
                            Orginal website being redesigned
                        </figcaption>
                </figure>
            </div>

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

        </div>

        <div class="row centered">

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <figure>
                    <a href="http://justinfranzen.com/cleveland-fire/" target="_blank"><img src="images/cf.jpg" alt="Cleveland Fire Dept" width="600" class="site" onmouseover="imgResize(this)" onmouseout="normalImg(this)"/></a>
                            <figcaption>
                                <a href="http://www.clevelandfire.org/" target="_blank" class="weblink">Original Website</a> 
                        </figcaption>
                </figure>
            </div>

             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <figure>
                  
                </figure>
                </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <figure>
                       
                    </figure>
            </div>
            
    </div>
    
</div>
    
<div class="section">
    
    <div id="contact"></div>
    
    <h2>Contact</h2>
    
    <div class="line"></div>
    
   <form id="myForm" action="index.php" method="post" >

         <label for="fname">First Name *</label><input type="text" name="firstname" onfocus = "colorChange(this)" onfocusout = "focusOut(this)" size="14" placeholder="First Name" value="<?php if(isset($_POST['firstname'])) echo $_POST['firstname'];?>">
         <p class="error"><?php if(isset($errors['firstname'])) echo $errors['firstname']; ?></p>
         <p class="error"><?php if(isset($errors['valid_firstname'])) echo $errors['valid_firstname']; ?></p>

          <label for="lname">Last Name *</label><input type="text" name="lastname" onfocus = "colorChange(this)" onfocusout = "focusOut(this)" size="14" placeholder="Last Name" value="<?php if(isset($_POST['lastname'])) echo $_POST['lastname'];?>">
          <p class="error"><?php if(isset($errors['lastname'])) echo $errors['lastname']; ?></p>
          <p class="error"><?php if(isset($errors['valid_lastname'])) echo $errors['valid_lastname']; ?></p>

          <label for="email">Email *</label><input type="email" name="email" onfocus = "colorChange(this)" onfocusout = "focusOut(this)" placeholder="Email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>">
         <p class="error"><?php if(isset($errors['email'])) echo $errors['email']; ?></p>

         <label for="message">Message *</label>
         <textarea rows="5" style="width:100%" onfocus = "colorChange(this)" onfocusout = "focusOut(this)" name="message" placeholder="Message"></textarea><br>
       
       <br>
       <br>
        <p align="center"><input type="submit" value="Send" name="Submit" id="submit">
            <input type="hidden" name="submitted" value="TRUE" /></p>
    </form> 
        
</div>
    
</div>
    
</body>  
<?php
include 'includes/footer.php';
?>


