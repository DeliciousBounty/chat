<?php 
    session_start();
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
            <a class='' href='index.php'>Home</a>
            <?php  if(!isset($_SESSION['friendslogin'])){ ?> <a class='selected' href='registration.php'>Registration</a> <?php } ?>
            <a class='' href='members.php'>Members</a>
           
            <?php  if(isset($_SESSION['friendslogin'])){ ?>
            <a class='' href='feed.php'>Feed</a>
                
            <a class='' href='friends.php'>Friend List</a>

            <a class='' href='profile.php'>Profile</a>
            <a class='' href='?logout=true'>Logout</a> <?php } ?>
        </div>
  

<div class="container" style="border:solid 2px #3345;margin-top: 60px;padding: 20px;">
    <div id="banner-div">
        <div style="text-align: center;width: 40%;">
            <img src="images/quiz2.png" height="80" >
            <h4>Create Account</h4>
            <p><?php if(isset($_SESSION['alert'])){echo $_SESSION['alert'];$_SESSION['alert']=''; } ?></p>
            <form  method="post" action="sign-process.php" onsubmit="return createAccount()" enctype="multipart/form-data" >
                    <div class="form-group">
                        <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                    </div>
                     <div class="form-group">
                        <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="address" class="form-control" placeholder="Address" required>
                    </div>
                    <div class="form-group">
                        <input  pattern="/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/" type="email" name="email" class="form-control" placeholder="Email Address" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password2" id="password2" class="form-control" placeholder="Confirm Password" required>
                    </div>
                     <div class="form-group">
                        <small>Profile Picture</small>
                        <input type="file" name="image" id="image" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <a href="index.php" class="btn">I have an account</a>
                        <button class="btn btn-primary">Create Account</button>

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

 <div class="footer col-lg-12" style="margin-top: 100px;text-align: left;bottom: 0;width: 100%;">
        <div class="col-lg-12">
        </div>
        <div class="col-lg-12">
        </div>
    </div>
</body>

<script type="text/javascript">
    function createAccount(){
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;
        var password2 = document.getElementById('password2').value;
        if(username.length <5 ){
            alert('Username must be atleast 5 letters');
            return false;

        }else if(password !=password2){
            alert('Password repeat mismatched');
            return false;
        }else if(password.length<5){
             alert('Password must be atleast 5 letters');
            return false;
        }else{
            return true;
        }

    }
</script>

</html>