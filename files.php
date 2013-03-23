

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
                        <div id= "cont">
 
</div>

                        <div clas"nav-collapse collapse">
                           
 
      <form action="search.php" method="post" class="navbar-search pull-right">
            <input type="text"  class="search-query" name="searchterm" placeholder="Search...">
                <button class="btn btn-mini">Search</button>
             
            </div>
        </form>
                            <ul class="nav pull-right">
                                <li><a href="securedpage.php">Home</a></li>
                                <li class="active"><a href="files.php">Files</a></li>
                                <li><a href="stared.php">Stared Files</a></li>
                                <li><a href="logout.php">Log Out</a></li>
                            </ul>
                        
                    </div>
                </div>
            </div>
            </div>
            <p></P>
                <p></P>&nbsp;&nbsp;&nbsp;&nbsp;
                    <p></P>


            <div class="container">
                <div class="row-fluid"> 
                <div class="span4"> 
                    <form action="files.php" method="post"  enctype="multipart/form-data">
        <input type="file" name="uploaded_file"/>
        <input type="submit" class="btn btn-info btn-medium" value="upload"/>
     </form>
                </div>

                 

                
                <div class="span8">
                    
      <?php
// Check if a file has been uploaded
if(isset($_FILES['uploaded_file'])) {
    // Make sure the file was sent without errors
    if($_FILES['uploaded_file']['error'] == 0) {
        // Connect to the database
        $dbLink = new mysqli('localhost', 'root', '', 'jdvsd2');
        if(mysqli_connect_errno()) {
            die("MySQL connection failed: ". mysqli_connect_error());
        }
 
        // Gather all required data
        $name = $dbLink->real_escape_string($_FILES['uploaded_file']['name']);
        $mime = $dbLink->real_escape_string($_FILES['uploaded_file']['type']);
        $data = $dbLink->real_escape_string(file_get_contents($_FILES  ['uploaded_file']['tmp_name']));
        $size = intval($_FILES['uploaded_file']['size']);
 
        // Create the SQL query
        $query = "
            INSERT INTO `file` (
                `name`, `mime`, `size`, `data`, `created`
            )
            VALUES (
                '{$name}', '{$mime}', {$size}, '{$data}', NOW()
            )";
 
        // Execute the query
        $result = $dbLink->query($query);
 
        // Check if it was successfull
        if($result) {
            echo 'Success! Your file was successfully added!';
        }
        else {
            echo 'Error! Failed to insert the file'
               . "<pre>{$dbLink->error}</pre>";
        }
    }
    else {
        echo 'An error accured while the file was being uploaded. '
           . 'Error code: '. intval($_FILES['uploaded_file']['error']);
    }
 
    // Close the mysql connection
    $dbLink->close();
}
?>



<?php require("db.php"); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="jquery-ui-1.7.1.custom.min.js"></script>



<style>


ul {
    margin: 0;
}



#contentLeft li {
    list-style: none;
    margin: 0 0 4px 0;
    padding: 10px;
    background-color:#00CCCC;
    border: #CCCCCC solid 1px;
    color:#fff;
}

#contentRight {
    float: right;
    width: 260px;
    padding:10px;
    background-color:#336600;
    color:#FFFFFF;
}

</style>


<script type="text/javascript">
$(document).ready(function(){ 
                           
    $(function() {
        $("#contentLeft ul").sortable({ opacity: 0.6, cursor: 'move', update: function() {
            var order = $(this).sortable("serialize") + '&action=updateRecordsListings'; 
            $.post("updateDB.php", order, function(theResponse){
                $("#contentRight").html(theResponse);
            });                                                              
        }                                 
        });
    });

}); 
</script>
<span style="cursor:move">

    <div id="contentWrap">

        
        <div id="contentLeft">
            <ul>
                <?php
                $query  = "SELECT * FROM file ORDER BY size ASC";
                $result = mysql_query($query);
                
                while($row = mysql_fetch_array($result, MYSQL_ASSOC))
                {

                ?>
                    <li id="recordsArray_<?php echo $row['id']; ?>"> <?php echo "File Name: &nbsp; " .$row['name'] ."<br/> Created: &nbsp;&nbsp;&nbsp;&nbsp; " . $row['created']  ;?></li>
                
                <?php } ?>
            </ul>
            </div>
        </span><br>
        <?php
// Make sure an ID was passed
if(isset($_GET['id'])) {
// Get the ID
    $id = intval($_GET['id']);
 
    // Make sure the ID is in fact a valid ID
    if($id <= 0) {
        die('The ID is invalid!');
    }
    else {
        // Connect to the database
        $dbLink = new mysqli('localhost', 'root', '', 'jdvsd2');
        if(mysqli_connect_errno()) {
            die("MySQL connection failed: ". mysqli_connect_error());
        }
 
        // Fetch the file information
        $query = "
            SELECT `mime`, `name`, `size`, `data`
            FROM `file`
            WHERE `id` = {$id}";
        $result = $dbLink->query($query);
 
        if($result) {
            // Make sure the result is valid
            if($result->num_rows == 1) {
                
            // Get the row
                $row = mysqli_fetch_assoc($result);
 
                // Print headers
                header("Content-Type: ". $row['mime']);
                header("Content-Length: ". $row['size']);
                header("Content-Disposition: attachment; filename=". $row['name'])
                ;
 
                // Print data
                echo $row['data'];
            }
            else {
                echo 'Error! No image exists with that ID.';
            }
 
            // Free the mysqli resources
            @mysqli_free_result($result);
        }
        else {
            echo "Error! Query failed: <pre>{$dbLink->error}</pre>";
        }
        @mysqli_close($dbLink);
    }
}
?>
    </div>
    </div>
    
</body>

</html>

