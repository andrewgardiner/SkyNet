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
<meta charset="utf-8">
<title>SkyNet</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="css2/bootstrap.css" rel="stylesheet"> 
<link href="css2/bootstrap-responsive.css" rel="stylesheet"> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script language="javascript">
$(document).ready(function(){

    //show loading bar

    function showLoader(){

        $('.search-background').fadeIn(200);

    }
    //hide loading bar
    function hideLoader(){
        $('#sub_cont').fadeIn(1500);
        $('.search-background').fadeOut(200);
    };

    $('#search').keyup(function(e) {
    if(e.keyCode == 13) {
        showLoader();
            $('#sub_cont').fadeIn(1500);
            $("#content #sub_cont").load("search.php?val=" + $("#search").val(), hideLoader());
        }
    });

      $(".searchBtn").click(function(){
        //show the loading bar
        showLoader();
        $('#sub_cont').fadeIn(1500);
        $("#content #sub_cont").load("search.php?val=" + $("#search").val(), hideLoader());
    });
});

</script>

    </head>
    <body>
            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container">
                        
                        </a>
                        <a href="#"class="brand">SkyNet</a>
                        <div id= "cont">
 
</div>

                        <div clas"nav-collapse collapse">
                            
   <form action="search.php" method="post" class="navbar-search pull-right">
            <input type="text"  class="search-query" name="searchterm" placeholder="Search...">
                <button class="btn btn-mini">Search</button>
             
            </div>
        </form>                  <ul class="nav pull-right">
                                <li><a href="securedpage.php">Home</a></li>
                                <li class="active"><a href="files.php">Files</a></li>
                                <li><a href="stared.php">Stared Files</a></li>
                                <li><a href="logout.php">Log Out</a></li>
                            </ul>
                        
                    </div>
                </div>
            </div>
            <p></P>
                <p></P>&nbsp;&nbsp;&nbsp;&nbsp;
                    <p></P>

 </div>
    </div>
    <div class="container">
                <div class="row-fluid">
                <div class="span12">
                    <p> <?php
/*set varibles from form */
$searchterm = $_POST['searchterm'];
trim ($searchterm);
/*add slashes to search term*/
if (!get_magic_quotes_gpc())
{
$searchterm = addslashes($searchterm);
}

/* connects to database */
@ $dbconn = new mysqli('localhost', 'root', '', 'jdvsd2'); 
if (mysqli_connect_errno()) 
{
echo 'Error: Could not connect to database. Please try again later.';
exit;
}
/*query the database*/
$query = "select * from file where name like '%".$searchterm."%'";
$result = $dbconn->query($query);
/*number of rows found*/
$num_results = $result->num_rows;

echo '<p>Found: '.$num_results.'</p>';
/*loops through results*/
echo '<table width="100%">
                <tr>
                    <td><b>Name</b></td>
                    <td><b>Created</b></td>
                    <td><b>Download</b></td>
                    <td><b>Delete</b></td>
                    
                </tr>';
for ($i=0; $i <$num_results; $i++)
{
$num_found = $i + 1;
$row = $result->fetch_assoc();

    // Print each file
        
            echo "
                <tr>
                    <td>{$row['name']}</td>
                    <td>{$row['created']}</td>
                    <td><a href='get_file.php?id={$row['id']}'>Download</a></td>
                    <td><a href='delete.php?id={$row['id']}'>Delete</a></td>
                   
                </tr>";
        }
 
        // Close table
        echo '</table>';

/*free database*/
$result->free();
$dbconn->close();
?></p>


</body>
</html>