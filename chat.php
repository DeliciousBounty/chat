<?php 
    session_start();
    include 'database.php';
    include 'common.php';
    $touser ='';
    if(isset($_GET['to'])){
    $touser = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM user WHERE id = '{$_GET['to']}'"));

   $messages = mysqli_query($con,"SELECT * FROM messages WHERE (sent = '{$_SESSION['logUserId']}' AND receive = '{$touser['id']}') OR (receive = '{$_SESSION['logUserId']}' AND sent = '{$touser['id']}') ORDER BY id ASC");

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
            <a class='' href='index.php'>Home</a>
            <?php  if(!isset($_SESSION['friendslogin'])){ ?> <a  href='registration.php'>Registration</a> <?php } ?>
            <a class='' href='members.php'>Members</a>
           
            <?php  if(isset($_SESSION['friendslogin'])){ ?>
            <a class='' href='feed.php'>Feed</a>
                
            <a class='' href='friends.php'>Friend List</a>
            <a class='selected' href='chat.php'>Messages</a>


            <a  href='profile.php'>Profile</a>
            <a class='' href='?logout=true'>Logout</a> <?php } ?>
        </div>
  

<div class="container" style="border:solid 2px #3345;margin-top: 60px;padding: 20px;">
    <div class="row">
        <div class="col-lg-12">
            <h4>Conversation</h4>
            <p><?php if(isset($_SESSION['alert'])){echo $_SESSION['alert'];$_SESSION['alert']=''; } ?></p>

            <center>
                <div class="col-lg-6" style="border:solid 2px #5575;border-radius:10px">
                  <h4><?php  if(isset($_GET['to'])){ echo $touser['fullname']; }else{ echo 'New Message';}?></h4>
                </div>

            </center>
            

        </div>
        <div class="col-lg-4" style="border:solid 2px #4445;margin-top: 30px;max-height: 350px;overflow-y: scroll;padding: 20px;">
            <h3>Friend List</h3>
            <div class="col-lg-12">
                <?php 
                include 'get-friend-message-buttons.php';

                 ?>
            </div>
        </div>

        <div class="col-lg-8" style="border:solid 2px #4445;margin-top: 30px;max-height: 350px;overflow-y: scroll;padding: 20px;">

            <table style="width:100%">
                
                    <?php 
                     if(isset($_GET['to'])){

                        while($message = mysqli_fetch_assoc($messages)){
                            if($message['sent']==$_SESSION['logUserId']){
                                ?>
                                <tr>
                                   <td width="50%"  style="text-align: right;"></td>
                                   <td width="50%"  style="text-align: right;">
                                        <p class="alert alert-primary" style="float: right;"><?php echo $message['message']; ?></p><br>
                                   </td>
                               </tr>
                                <?php
                            }else{
                                ?>
                               <tr>
                                   <td width="50%" style="text-align: left;">
                                        <p class="alert alert-danger" style="width: auto!important;float: left;"><?php echo $message['message']; ?></p><br>
                                   </td>
                                   <td width="50%" style="text-align: left;"></td>
                               </tr>
                                <?php
                            }
                            
                        }
                    }else{



                    }
                    ?>
            </table>
            <?php  if(isset($_GET['to'])){ ?>
           <form method="post" action="send-message.php">
                    <div class="form-group">
                        <input class="form-control" placeholder="New Message" type="text" name="message" required id="sent"  >
                        <input class="form-control" placeholder="New Message" type="hidden" name="sent" value="<?php echo $_SESSION['logUserId']; ?>" >
                        <input class="form-control" placeholder="New Message" type="hidden" name="receive" value="<?php echo $touser['id']; ?>" >
                        

                        <button name="update-basics" style="float: right;" id="sent" value="<?php echo $me['id']; ?>" class="btn btn-primary">Send</button>

                    </div>
           </form>
       <?php } ?>
                    

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