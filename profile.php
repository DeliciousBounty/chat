<?php 
    session_start();
    include 'database.php';

    include 'common.php';
   $me = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM user WHERE id = '{$_SESSION['logUserId']}'"));

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
            <?php  if(!isset($_SESSION['friendslogin'])){ ?> <a  href='registration.php'>Registration</a> <?php } ?>
            <a class='' href='members.php'>Members</a>
           
            <?php  if(isset($_SESSION['friendslogin'])){ ?>
            <a class='' href='feed.php'>Feed</a>
                
            <a class='' href='friends.php'>Friend List</a>
            <a class='' href='chat.php'>Messages</a>

            <a class='selected' href='profile.php'>Profile</a>
            <a class='' href='?logout=true'>Logout</a> <?php } ?>
        </div>
  

<div class="container" style="border:solid 2px #3345;margin-top: 60px;padding: 20px;">
    <div class="row">
        <div class="col-lg-12">
            <h4>Update Profile</h4>
            <p><?php if(isset($_SESSION['alert'])){echo $_SESSION['alert'];$_SESSION['alert']=''; } ?></p>

            <center>
                <div class="col-lg-4" style="border:solid 2px #5575;border-radius:10px">
                    <form action="update-image.php" enctype="multipart/form-data" method="post">
                    <img height="120" width="120" style="border-radius: 120px" src="images/users/<?php if($me['image']==''){ echo 'default.png'; }else{echo $me['image'];} ; ?>" height="120" >
                    <input type="file" name="image"> 
                    <button name="update-image" value="<?php echo $me['id']; ?>" class="btn btn-primary">Update</button>
                </form>
                </div>

            </center>
            

        </div>
        <div class="col-lg-6">
            

            <form method="post" action="update-basics.php">
                    <?php 
                    $name = explode(" ", $me['fullname']);
                     ?>
                
                    <div class="form-group">
                        <label class="label col-lg-12" style="text-align:left;color:#888">First Name</label>
                        <input type="text" name="fname" class="form-control" placeholder="First Name" value="<?php echo $name[0]; ?>" required>
                    </div>
                      <div class="form-group">
                        <label class="label col-lg-12" style="text-align:left;color:#888">Last Name</label>
                        <input type="text" name="fname" class="form-control" placeholder="Last Name" value="<?php echo $name[1]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label class="label col-lg-12" style="text-align:left;color:#888">Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Address" value="<?php echo $me['address']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label class="label col-lg-12" style="text-align:left;color:#888">Email</label>
                        <input type="email" value="<?php echo $me['email']; ?>" name="email" class="form-control" placeholder="Email Address" required>
                    </div>
                    <div class="form-group">
                        <label class="label col-lg-12" style="text-align:left;color:#888">User Name</label>
                        <input type="text" value="<?php echo $me['username']; ?>" name="username" id="username" class="form-control" placeholder="Username" required>
                    </div>

                    <div class="form-group">
                        <label class="label"></label>
                        <button name="update-basics" value="<?php echo $me['id']; ?>" class="btn btn-primary">Update Basic Details</button>

                    </div>
                    </form>
                    

        </div>
        <div class="col-lg-6">
            <form method="post" action="update-password.php">
                    <hr>
                    <div class="form-group">
                        <input type="password" name="old" id="old" class="form-control" placeholder="Old Password" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="New Password" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password2" id="password2" class="form-control" placeholder="Confirm Password" required>
                    </div>
                    <div class="form-group">
                        <button name="update-passwords" value="<?php echo $me['id']; ?>" class="btn btn-primary">Update Password</button>

                    </div>
                </form>

                
        </div>

        <div>
            
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


</html>