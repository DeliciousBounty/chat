<?php 
    session_start();
    include 'database.php';
    include 'common.php';
    
    if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM user WHERE email = '{$_POST['email']}' AND  username = '{$_POST['username']}' "))==0){
        ?>
        <script type="text/javascript">
            alert('User Not Found');
            window.location.href = 'forgot.php';
        </script>
        <?php
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
                <h2>New Password</h2>
                <form method="post" action="password-update-recovery.php">
                    <input type="hidden" name="user" value="<?php echo $_POST['username']; ?>">
                    <div class="form-group">
                        <input type="password" name="password1" class="form-control" placeholder="New Password" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password2" class="form-control" placeholder="Repeat Password" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Update Password</button>
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