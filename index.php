<?php

// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
if (isset($_SESSION['username'])) {
header('Location: securedpage.php');
}
?>

<html>
<head>
<meta charset="utf-8">
<title>SkyNet</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="css2/bootstrap.css" rel="stylesheet"> 
<link href="css2/bootstrap-responsive.css" rel="stylesheet"> 

	</head>
	<body>
			<div class="navbar navbar-fixed-top">
				<div class="navbar-inner">
					<div class="container">
						
						</a>
						<a href="#"class="brand">SkyNet</a>
						<div clas"nav-collapse collapse">
							<ul class="nav pull-right">
								<li class="active"><a href="#">Home</a></li>
								
								<li><a href="#">Contact</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="hero-unit">
				<h1>SkyNet</h1>
				<p> &emsp; &emsp;&emsp;Holding Data Up High</p>
				 <!--<style="float: right;"><IMG SRC="img/1.png">-->
			</div>

			<div class="container">
				<div class="row-fluid">
				<div class="span8">
					<p> SkyNet is an online storage ‘cloud’ website user can upload their personal information to the site knowing that is will be stored securely. This is one of the advantages of using SkyNet. As all of the information is stored on servers there is no need to carry around a computer of a USB stick as the website can be accessed from anywhere even your mobile or tablet device. One of the key features that SkyNet has is (FORGTE WHAT IS IS CALLED...DUMB ASS) as you can drag and drop your most used files to the top of the list without having to scroll through the entire files.</p>
					<div class="row-fluid">
						<div class="span4">
							<h4>Online File Sharing</h4>
							<P>SkyNet allows users to upload and download files from anywhere in the world</p>
						</div>
						<div class="span4"><h4>Security</h4>
							<P>Controlled by users managed by us!</P>
						</div>
						<div class="span4"><h4>Storage</h4>
							<P>Up to 5GB of free storage with the option to add more.</P>
						</div>
					</div>
					</div>
				<div class="span4">
					<div id="login">


<div id="login">
	<form method="post" action="loginproc.php">
  <h2>Login</h2>
   <p>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" autofocus required>
    </p>
    <p>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" autofocus required>
    </p>

        
		<p>
   <br/><input type="submit" value="Log in" />
	</p>
    </form>
</div><!--end login-->
</body>

</html>

