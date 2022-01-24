<?php 
    session_start();
    include 'database.php';
    include 'common.php';


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Friends</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link rel="stylesheet" type="text/css" href="css/styles.css">

</head>
<body>

  
    <div style='' class='navigation nav' >    
            <a  href='index.php'>Home</a>
                <?php  if(!isset($_SESSION['friendslogin'])){ ?> <a class='' href='registration.php'>Registration</a> <?php } ?>
            <a class='selected' href='members.php'>Members</a>
           
            <?php  if(isset($_SESSION['friendslogin'])){ ?>
            <a class='' href='feed.php'>Feed</a>
                
            <a class='' href='friends.php'>Friend List</a>
            <a class='' href='chat.php'>Messages</a>
            
            <a class='' href='profile.php'>Profile</a>
            <a class='' href='?logout=true'>Logout</a> <?php } ?>
        </div>
  

<div class="container col-lg-12" style="border:solid 2px #3345;margin-top: 60px;padding: 20px;">
   <h2>Members</h2>
   <hr>
   <?php 

   include 'get-all-members.php';
    ?>
</div>

 <div class="footer col-lg-12" style="margin-top: 100px;text-align: left;position: fixed;bottom: 0;width: 100%;">
        <div class="col-lg-12">
        </div>
        <div class="col-lg-12">
        </div>
    </div>
</body>
</html>