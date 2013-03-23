<?php

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
header('Location: index.php');
}

?>
<html>
<head>
<title>SkyNet</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="css2/bootstrap.css" rel="stylesheet"> 
<link href="css2/bootstrap-responsive.css" rel="stylesheet"
<link rel="stylesheet" href="test.css"/>
<script src="https://raw.github.com/wandoledzep/bxslider/master/jquery.bxSlider.min.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#slider1').bxSlider();
  });
</script>
<script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>
<script src="jquery.bxSlider.min.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#slider1').bxSlider();
  });
</script>
</head>	<body>
			<div class="navbar navbar-fixed-top">
		 <div class="navbar navbar-fixed-top">
         <div class="navbar-inner">
                    <div class="container">
                        
                        </a>
                        <a href="#"class="brand"><?php echo $_SESSION['username']; ?>, Welcome to SkyNet </a>
                        <div id= "cont">
 
</div>

                        <div clas"nav-collapse collapse">
                           
 
      <form action="search.php" method="post" class="navbar-search pull-right">
            <input type="text"  class="search-query" name="searchterm" placeholder="Search...">
                <button class="btn btn-mini">Search</button>
             
            </div>
        </form>
                            <ul class="nav pull-right">
                                <li class="active"><a href="securedpage.php">Home</a></li>
                                <li ><a href="files.php">Files</a></li>
                                <li><a href="stared.php">Stared Files</a></li>
                                <li><a href="logout.php">Log Out</a></li>
                            </ul>
                        
                    </div>
                </div>
            </div>
            </div>
		

			<div class="hero-unit">
				<h1>SkyNet</h1>
				<p> &emsp; &emsp;&emsp;Holding Data Up High</p>
    <center>
                   <ul id="slider1">
<li><img src="img2/phone.png" /><p>As SkyNet has been designed with students in mind. This website can be <br>
    be viewed on desktops, tablets and even mobiles with no loss in the websites functionality or design.</p></li>

  <li><img src="img2/g.PNG" /><p>All the files that you use most can be dragged and dropped to the top or bottom of the list. <br>
    This will allow you to access your most important files quicker. </p></li>

 <li><img src="img2/phone.png" /><p>Version Control</p></li>
</ul>
				
			</div>


</body>
</html>

