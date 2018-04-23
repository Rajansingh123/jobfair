<?php
// Include config file
require_once 'config.php';
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST['password']))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Please confirm password.';     
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Password did not match.';
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
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
<style>
    /* layout.css Style */
.upload-drop-zone {
  height: 200px;
  border-width: 2px;
  margin-bottom: 20px;
}

/* skin.css Style*/
.upload-drop-zone {
  color: #ccc;
  border-style: dashed;
  border-color: #ccc;
  line-height: 200px;
  text-align: center
}
.upload-drop-zone.drop {
  color: #222;
  border-color: #222;
}



.file-preview-input {
    position: relative;
    overflow: hidden;
    margin: 0px;    
    color: #333;
    background-color: #fff;
    border-color: #ccc;    
}
.file-preview-input input[type=file] {
	position: absolute;
	top: 0;
	right: 0;
	margin: 0;
	padding: 0;
	font-size: 20px;
	cursor: pointer;
	opacity: 0;
	filter: alpha(opacity=0);
}
.file-preview-input-title {
    margin-left:2px;
}
    </style>
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
	        <a class="navbar-brand" href="index.php"><img src="https://static.wixstatic.com/media/503c95_17181385a65f2499b03f0d5e17046655.png" alt=""/ height="150px"></a>
	    </div>
	    <!--/.navbar-header-->
	    <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" style="height: 1px;">
		<ul class="nav navbar-nav">
			<li>
            <a href="#">Home</a></li>
							<div class="dropdown">
			<button class="dropbtn">Login</button>
			<div class="dropdown-content">
				<a href="login.php">Login as Job seeker</a>
				<a href="emp/login-emp.php">Login as employer</a>
			</div>
            </div>
            <li><a href="pm/index.php">Messenger</a></li>
			
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
<div class="banner_1">
	<div class="container">
		<div id="search_wrapper1">
		   <div id="search_form" class="clearfix">
		    <h1>Start your job search</h1>
		    <p>
			 <input type="text" class="text" placeholder=" " value="Enter Keyword(s)" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Keyword(s)';}">
			 <label class="btn2 btn-2 btn2-1b"><input type="submit" value="Find Jobs"></label>
			</p>
           </div>
		</div>
   </div> 
</div>	

<div class="container">
    <div class="single">  
	   <div class="form-container">
		
		<h4><p>Thank you for your interest in signing up for the Simcoe Muskoka Online Job Fair. Please fill out this form to guarantee your participation in the job fair. Be sure to log in on February 4th between 10 am and 2:30 pm (job fair closes at 3:00 pm).</p>
		<p>The day of the online job fair, you can view all employer booths and check out the postings. You will be able to apply for specific jobs at that time. </p>
		<p>This hiring event is free for employers and job seekers. </p>
		<h2>Register Form</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label>Username</label>
                    <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>    
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                    <span class="help-block"><?php echo $confirm_password_err; ?></span>
                </div>    
        <div class="row">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="lastName">Mobile Number</label>
                <div class="col-md-9">
                    <input type="text" path="lastName" id="lastName" class="form-control input-sm"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="sex">Sex</label>
                <div class="col-md-9" class="form-control input-sm">
                    <div class="radios">
				        <label for="radio-01" class="label_radio">
				            <input type="radio" checked=""> Male
				        </label>
				        <label for="radio-02" class="label_radio">
				            <input type="radio"> Female
				        </label>
	                </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="dob">Date of birth</label>
                <div class="col-md-9">
                    <input type="text" path="dob" id="dob" class="form-control input-sm"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="email">Email</label>
                <div class="col-md-9">
                    <input type="text" path="email" id="email" class="form-control input-sm"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="country">Location</label>
                <div class="col-md-9">
                    <select path="country" id="country" class="form-control input-sm">
                        <option value="">Select Location</option>
                        <option value="">Ontario</option>
                    
                    </select>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="country">Work Experience</label>
                <div class="col-md-9">
                    <select path="country" id="country" class="form-control input-sm">
                        <option value="">Select</option>
                        <option value="">Fresher</option>
                        <option value="">0</option>
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option> 
                        <option value="">4</option> 
                        <option value="">5</option> 
                        <option value="">6</option> 
                        <option value="">7</option> 
                        <option value="">8</option> 
                        <option value="">9</option> 
                        <option value="">10</option> 
                        <option value="">11</option>
                        <option value="">12</option>  
                        <option value="">13</option>
                        <option value="">14</option>
                        <option value="">15</option>      
                    </select>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="country">Education</label>
                <div class="col-md-9">
                    <select path="country" id="country" class="form-control input-sm">
                        <option value="">Select</option>
                        <option value="">Some High School</option> 
						<option value="">Completed High School</option>
						<option value="">Some College/University</option> 
						<option value="">Completed College/University</option>
						<option value="">Apprenticeship, Trades, Certificate, or Diploma</option>
                    </select>
               </div>
            </div> 
		</div>
		<div class="row">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="country">Status</label>
                <div class="col-md-9">
                    <select path="country" id="country" class="form-control input-sm">
						<option value="">Employed</option>
						<option value="">Employed-Fullt-ime</option>
						<option value="">Employed-Part-time</option>
                        <option value="">Unemployed</option> 
						<option value="">Retired</option> 
						<option value="">Self-Employed</option>
                    </select>
               </div>
            </div>
		</div>
		<div class="row">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="country">What is your main field of work or experience?</label>
                <div class="col-md-9">
                    <select path="country" id="country" class="form-control input-sm">
                        <option value="">Select</option>
                        <option value="">Business, Finance or Administration. Includes all levels of office admin, accounting/bookkeeping, human resources, banking, etc.</option> 
						<option value="">Natural and Applied Sciences. Includes all levels of computer or electronic programmers and technicians, engineers, etc.</option>
						<option value="">Health Occupations. Includes all levels of medical, dental, optical, pharmacists, therapy providers, PSW’s, etc.</option> 
						<option value="">Education, Law, Social & Community and Government Services. Includes all levels of instructors, policy writing, etc.</option>
						<option value="">Art, Culture, Recreation and Sport. Includes all levels of resort and camp staff/counsellors,etc.</option>
						<option value="">Trades, Transport and Equipment Operators. Includes most skilled trades, construction contractors and labourers, etc.</option>
						<option value="">Natural Resources and Agriculture – Includes all levels of  mining, farming, logging, landscaping and harvesting</option>
						<option value="">OTHER not listed: ______________________</option>
						
					</select>
               </div> 
            </div> 
		</div>
        <div class="row">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="subjects">Subjects</label>
                <div class="col-md-9 sm_1">
                   <textarea cols="77" rows="6" value=" " onfocus="this.value='';" onblur="if (this.value == '') {this.value = '';}"> </textarea>
                    
                </div>
            </div>
        </div>
        <div class="container"> <br />
    <div class="row">
    	<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"><strong>Upload files</strong> <small> </small></div>
				<div class="panel-body">
					<div class="input-group file-preview">
						<input placeholder="" type="text" class="form-control file-preview-filename" disabled="disabled">
						<!-- don't give a name === doesn't send on POST/GET --> 
						<span class="input-group-btn"> 
						<!-- file-preview-clear button -->
						<button type="button" class="btn btn-default file-preview-clear" style="display:none;"> <span class="glyphicon glyphicon-remove"></span> Clear </button>
						<!-- file-preview-input -->
						<div class="btn btn-default file-preview-input"> <span class="glyphicon glyphicon-folder-open"></span> <span class="file-preview-input-title">Browse</span>
							<input type="file" accept="text/cfg" name="input-file-preview"/>
							<!-- rename it --> 
						</div>
						<button type="button" class="btn btn-labeled btn-primary"> <span class="btn-label"><i class="glyphicon glyphicon-upload"></i> </span>Upload</button>
						</span> </div>
					<!-- /input-group image-preview [TO HERE]--> 
					
					<br />
					
					<!-- Drop Zone -->
					
	<div class="panel panel-default">
    <div class="row clearfix">
		<div class="col-md-12 column">
			<table class="table table-bordered table-hover" id="tab_logic">
				<thead>
					<tr >
					<th class="text-center">
						File Name
					</th>
				</thead>
				<tbody>
					<tr>
					</tr>
                    <tr id='addr1'></tr>
				</tbody>
			</table>
		</div>
	</div>

</div>
					
					
					
					
					<br />
					<!-- Progress Bar -->
					<div class="progress">
						<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"> <span class="sr-only">60% Complete</span> </div>
					</div>
					<br />

				</div>
			</div>
		</div>
        
        
        
	</div>
</div>
        <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
    </form>
    </div>
 </div>
</div>
<div class="footer">
<div class="container">
    
    <div class="col-md-3 grid_3">
        <h4>Navigate</h4>
        <ul class="f_list f_list1">
            <li><a href="index.php">Home</a></li>
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