<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();?>

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
	<div class="page-header">
	</body>
<div class="banner">
	<div class="container">
		<div id="search_wrapper">
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
	 <div class="single">  
	   <div class="col-md-4">
	   	  <div class="col_3">
	   	  	<h3>Calender</h3>
	   	  	<iframe src="https://calendar.google.com/calendar/b/1/embed?title=Event%20Calander&amp;height=600&amp;wkst=1&amp;bgcolor=%239999ff&amp;src=1odhhlfjl5a7ov24v7g76g9a9o%40group.calendar.google.com&amp;color=%23691426&amp;ctz=America%2FToronto" style="border:solid 1px #777" width="450" height="300" frameborder="0" scrolling="no"></iframe>
	   	  </div>
			</div>
	 </div>
	 <div class="col-md-8">
	      <div class="col_1">
   	        <div class="col-sm-4 row_2">
				<a href="single.html"><img src="images/a1.jpg" class="img-responsive" alt=""/></a>
			</div>
			<div class="col-sm-8 row_1">
				<h3>Login first to see Job postings and Upload jobs</a></h3>

			</div>
			<div class="clearfix"> </div>
		   </div>
		   
	   </div>
	   <div class="clearfix"> </div>
	 </div>
</div>

<!-- END PHP Live! HTML Code -->
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