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
            <a class='selected' href='index.php'>Home</a>
                <?php  if(!isset($_SESSION['friendslogin'])){ ?> <a class='' href='registration.php'>Registration</a> <?php } ?>
            <a class='' href='members.php'>Members</a>
           
            <?php  if(isset($_SESSION['friendslogin'])){ ?>
            <a class='' href='feed.php'>Feed</a>

            <a class='' href='friends.php'>Friend List</a>
            <a class='' href='chat.php'>Messages</a>

            <a class='' href='profile.php'>Profile</a>
            <a class='' href='?logout=true'>Logout</a> <?php } ?>
        </div>
  

<div class="container" style="border:solid 2px #3345;margin-top: 60px;padding: 20px;">
    <div id="banner-div">
        <div style="text-align: center;width: 40%;">
            <img src="images/quiz2.png" height="160" >
            <p><?php if(isset($_SESSION['alert'])){echo $_SESSION['alert'];$_SESSION['alert']=''; } ?></p>
                <h2>Forgot Password</h2>
                <form method="post" action="forgot-process.php">
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Email Address" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Recover</button>
                        <br>
                        <a href="index.php">Go Back to Login</a>

                    </div>
                </form>
            

        </div>
        <div>
            <p style="font-size:48px;font-family: fantasy;margin-top: 0px;line-height: 50px;    text-shadow: 1px 2px #3339;
    color: #ef00a6;">
                

                Connection is evolving and<br>
                 so are we..
                <br>
                  <b style="font-size:22px;color: #343434;font-family: cursive;">We build technologies that help people <br> connect with friends and family, find communities</b>
            </p>
        </div>
          
       
    </div>
    
</div>

 <div class="footer col-lg-12" style="margin-top: 100px;text-align: left;position: fixed;bottom: 0;width: 100%;">
        <div class="col-lg-12">
        </div>
        <div class="col-lg-12">
        </div>
    </div>
</body>
</html>