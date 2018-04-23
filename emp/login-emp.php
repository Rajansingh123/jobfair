<?php
// Include config file
require_once 'config-emp.php';
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT username, password FROM employee WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            /* Password is correct, so start a new session and
                            save the username to the session */
                            session_start();
                            $_SESSION['username'] = $username;      
                            header("location: index-emp.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = 'The password you entered was not valid.';
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = 'No account found with that username.';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE HTML>
<html>
<head>
<title>Simcoe Muskoka Job Fair</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<style>
.dropbtn {
	background-color: #f15f43;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}


.dropdown:hover .dropdown-content {
    display: block;
}

</style>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<!----font-Awesome----->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!----font-Awesome----->
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
	<div class="container">
	    <div class="navbar-header">
	        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
	        </button>
	        <a class="navbar-brand" href="../index.html"><img src="https://static.wixstatic.com/media/503c95_17181385a65f2499b03f0d5e17046655.png" height="150px"></a>
	    </div>
	    <!--/.navbar-header-->
	    <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" style="height: 1px;">
		<ul class="nav navbar-nav">
			<li>
			<a href="#">Home</a></li>
							<div class="dropdown">
			<button class="dropbtn">Login</button>
			<div class="dropdown-content">
				<a href="../login.php">Login as Job seeker</a>
				<a href="login-emp.php">Login as employer</a>
			</div>
			</div>
			<li><a href="../pm/index.php">Messenger</a></li>
				<!-- BEGIN PHP Live! HTML Code -->
<li><span style="color: #0000FF; margin:20px;text-decoration: underline; line-height: 0px !important; cursor: pointer;" id="phplive_btn_1524164394" onclick="phplive_launch_chat_0()"></span>
<script data-cfasync="false" type="text/javascript">

(function() {
var phplive_e_1524164394 = document.createElement("script") ;
phplive_e_1524164394.type = "text/javascript" ;
phplive_e_1524164394.async = true ;
phplive_e_1524164394.src = "https://t2.phplivesupport.com/200375566/js/phplive_v2.js.php?v=0|1524164394|2|" ;
document.getElementById("phplive_btn_1524164394").appendChild( phplive_e_1524164394 ) ;
})() ;

</script>
			
		</ul>
	</div>
	<div class="clearfix"> </div>
  </div>
	<!--/.navbar-collapse-->
</nav>
	
<div class="container">

	 <div class="col-md-8 single_right">
	 	   <div class="login-form-section">
                <div class="login-content">
						<div class="wrapper">
								<h2>Login as a Employer</h2>
								<p>Please fill in your credentials to login.</p>
								<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
									<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
										<label>Username</label>
										<input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
										<span class="help-block"><?php echo $username_err; ?></span>
									</div>    
									<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
										<label>Password</label>
										<input type="password" name="password" class="form-control">
										<span class="help-block"><?php echo $password_err; ?></span>
									</div>
									<div class="form-group">
										<input type="submit" class="btn btn-primary" value="Login">
									</div>
									<p>Don't have an account? <a href="signup-emp.php">Sign up now</a>.</p>
								</form>
							</div> 
                     <div class="forgot">


					     <div class="clearfix"> </div>
			        </div>
					
                </div>
         </div>
   </div>
  <div class="clearfix"> </div>
 </div>
</div>
<div class="footer">
<div class="container">
	
	<div class="col-md-3 grid_3">
		<h4>Navigate</h4>
		<ul class="f_list f_list1">
			<li><a href="index.html">Home</a></li>
			<li><a href="login.html">Sign In</a></li>
			<li><a href="login.html">Join Now</a></li>
			<li><a href="about.html">About</a></li>
		</ul>
		<ul class="f_list">
			<li><a href="features.html">Features</a></li>
			<li><a href="terms.html">Terms of use</a></li>
			<li><a href="contact.html">Contact Us</a></li>
			<li><a href="jobs.html">Post a Job</a></li>
		</ul>
		<div class="clearfix"> </div>
	</div>
	<div class="col-md-3 grid_3">
		<h4>Help</h4>
		<div class="footer-list">
		<div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

		</div>
	</div>
	<div class="col-md-3 grid_3">
		<h4>Seeking</h4>
		<p>Free virtual hiring event for job seekers and employers within Simcoe County and Muskoka
			<br>
			*Job Seekers
			<br>
			*Text chat live with employers<br>
			*View company booths and job postings<br>
			*Upload resumes and apply for positions<br></p>
	</div>
	
	<div class="col-md-3 grid_3">
		<h4>Sign up for our newsletter</h4>
		<form>
			<input type="text" class="form-control" placeholder="Enter your email">
			<button type="button" class="btn red">Subscribe now!</button>
		</form>
	</div>
	<div class="clearfix"> </div>
</div>
</div>
</body>
</html>		