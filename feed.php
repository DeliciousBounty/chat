<?php 
    session_start();
    include 'database.php';
    include 'common.php';


?>

        <?php   
            if(isset($_POST['addImage'])){
                    //store image
                $title = $_POST['title'];
                $filename = $_FILES["image"]["name"];
                $tempname = $_FILES["image"]["tmp_name"];    
                $folder = "images/post/".$filename;
                $user = $_SESSION['logUserId'];
                move_uploaded_file($tempname, $folder);

                mysqli_query($con,"INSERT INTO feed(title,image,user) VALUES ('$title','$filename','$user')");

            }

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
            <a class='' href='members.php'>Members</a>
           
            <?php  if(isset($_SESSION['friendslogin'])){ ?>
            <a class='selected' href='feed.php'>Feed</a>

            <a class='' href='friends.php'>Friend List</a>
            <a class='' href='chat.php'>Messages</a>
            
            <a class='' href='profile.php'>Profile</a>
            <a class='' href='?logout=true'>Logout</a> <?php } ?>
        </div>
  

<div class="container col-lg-8 col-offset-2" style="border:solid 2px #3345;margin-top: 60px;padding: 20px;">


   <h5>Add Image</h5>  
    <div class="col-lg-6">
        <form method="post" action="" enctype="multipart/form-data">   
            <input required name="image"   class="form-control" type="file">
            <input required placeholder="Image Caption" name="title"   class="form-control" type="text"><br>   
            <button type="submit" name="addImage" class="btn btn-success">Upload</button>

    </form> 
    </div>    

    <hr>
   <h2>Feed</h2>

   <?php 

   include 'get-feed.php';
    ?>
</div>

 <div class="footer col-lg-12" style="margin-top: 100px;text-align: left;;width: 100%;">
        <div class="col-lg-12">
        </div>
        <div class="col-lg-12">
        </div>
    </div>
</body>
</html>