<!DOCTYPE html><head>
<?php
error_reporting(0);
session_start();  
?>
        <meta charset="UTF-8" />
    
        <title>Homepage</title>
        <head>
        <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
    

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>index</title>
    
    <script src="js/vendor/modernizr.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
<body>
        <div class="container">
         
            <div class="codrops-top">
                <a href="">	Authors: Brandon, Chaz and Matthew. </a>
                <span class="right">
                    
                        <strong>Senior Software and Professional Practice</strong>
                    </a>
                </span>
              <div class="clr"></div>
    </div>
            <header>
                <h1>Welcome to <span>Computer Science Advisor</span></h1>
				<nav class="codrops-demos">	
                <div id='cssmenu'>
<ul>
   
   <li><a href='advisor.php'><span>Advisor</span></a></li>
   <li><a href='coursehistory.php'><span>View/Edit Course History</span></a></li>
   <li><a href='usersettings.php'><span>Settings</span></a></li>
   <li><a href='logout.php'><span>Log Out</span></a></li>
  
  
   
				  
				  
				</nav>
            </header>
            <section>				
                <div id="container_demo" >
                    
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
    <h5>Update Personal Information</h5>
 
		<p><img src="CSAdvisor/redbar.png" alt="required" width="474" height="36"></p>
		
       <form  action="" method="post"> 
				  <div class="row">
			      <div class="large-12 columns"><label>Email Address*:</label>
						<input type="text" name="email" value="<?php echo getEmail();?>" >	
                    </div>
    </div>
				  
				<div class="row">
		    <div class="large-4 medium-4 columns">
						  <label>First Name*:</label>
						  <input type="text" name="fName" value="<?php echo getFName();?>" >
				  </div>
		    <div class="large-4 medium-4 columns">
						  <label>Last Name*:</label>
							<input type="text" name="lName" value="<?php echo getLName();?>" >
						
				  </div>
                  <div class="row">
		  
			     </div>
                 <p> </p>
                 
				</div>
	<span class="large-12 columns">
    <input type="submit" name="submit" value="Update Info" 
                      style= "height:25px; width:100px; float: right; text-align: justify" />
</span>	</form>

<div class="large-6 medium-6 columns"></div><!--row-->
    <div class="row">
      <div class="large-12 columns"><!--submit button--></div>
      
      </div>
      <p>&nbsp;  </p> 
      <p>&nbsp;  </p> 
      <p>&nbsp;  </p> 
      <div style="float: left;">
  <h5>Having an issue?</h5>
  	
        	<p>Contact Customer Support!</p>
            
        	<button onclick="contactInfo()" class="small button">Click Here</a>          
        </div>
   
   
</ul>
</div>

      
      <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
	 
	 <!-- JavaScript onClick Contact info button -->
	 function contactInfo() {
		var info = ' Phone: (270) 922-1940 \n'; 
			info += ' Email: Brandon.Kruse462@topper.wku.edu\n'; 
				
				alert(info);
	 
	 
	 }
	
	
	
      $(document).foundation();
    </script>
</body>

</html>

<?php
//update database
if($_POST['submit'] == "Update Info"){
$con=mysqli_connect("localhost",'root','pass',"csadvisor");
$email = mysqli_real_escape_string($con, $_POST['email']);
$fname = mysqli_real_escape_string($con ,$_POST['fName']);
$lname = mysqli_real_escape_string($con ,$_POST['lName']);

$sql = "UPDATE `user` SET `email`='" . $email . "',`firstname`='" . $fname . "',`lastname`='" . $lname . "' WHERE iduser=" . $_SESSION['uid'] . ""; 
mysqli_query($con,$sql);

if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
 
 }

//functions  
function getEmail(){
	$con=mysqli_connect("localhost",'root','pass',"csadvisor");
	$email = mysqli_query($con,"SELECT email FROM user WHERE iduser='" . $_SESSION['uid'] . "'");
	$emailaddress = '';
	while($row = mysqli_fetch_array($email)){
		$emailaddress = $row['email'];
	}
	return $emailaddress;
}

function getFName(){
	$con=mysqli_connect("localhost",'root','pass',"csadvisor");
	$fname = mysqli_query($con,"SELECT firstname FROM user WHERE iduser='" . $_SESSION['uid'] . "'");
	while($row = mysqli_fetch_array($fname)){
		$firstname = $row['firstname'];
	}
	return $firstname;
	
}

function getLName(){
	$con=mysqli_connect("localhost",'root','pass',"csadvisor");
	$lname = mysqli_query($con,"SELECT lastname FROM user WHERE iduser='" . $_SESSION['uid'] . "'"); 
	while($row = mysqli_fetch_array($lname)){
		$lastname = $row['lastname'];
	}
	return $lastname;
}

?>
