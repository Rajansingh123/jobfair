<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login-emp.php");
  exit;
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
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
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
	        <a class="navbar-brand" href="index.html"><img src="https://static.wixstatic.com/media/503c95_17181385a65f2499b03f0d5e17046655.png" alt=""/ height="150px"></a>
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
				<a href="login-emp.php">Login as employer</a>
			</div>
			</div>
			<li><a href="../pm/index.php">Messenger</a></li>
			<a href="../index.php" class="btn btn-danger">Sign Out</a>
			
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
    <center><h2>Hi, <b><?php echo htmlspecialchars($_SESSION['username']); ?></b>Upload your jobs</h2></center>
    <div class="row">
                <h3>Yor Jobs</h3>
			</div>
			
            <div class="row">
            <p>
                    <a href="create.php" class="btn btn-success">Create</a>
                </p>
                <table class="table table-striped table-bordered">

                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Job description</th>
                      <th>Salary</th>
                      <th>Action</th>

                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'jobs.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM customers ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['name'] . '</td>';
                            echo '<td>'. $row['description'] . '</td>';
                            echo '<td>'. $row['salary'] . '</td>';
                            echo '<td width=250>';
                            echo '<a class="btn" href="read.php?id='.$row['id'].'">Read</a>';
                            echo ' ';
                            echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
                            echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
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