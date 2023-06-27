<?php
include '../shared/header.php';
include '../shared/navbar.php';
include '../general/env.php';
include '../general/functions.php';



$error=[];

if(isset($_POST['signup'])){
  $username = $_POST['username'];
  $Email = $_POST['email'];
  $Password= $_POST['password'];
  $Confirm_Pass =$_POST['confirm-password'];
  $specialization=$_POST['specialization'];
  $statues_id=$_POST['options'];
  if($Password == $Confirm_Pass)
  {
    $sql = "INSERT INTO `users` VALUES (null,'$username', '$Email', '$Password' , '$Confirm_Pass' ,'$specialization','$statues_id')";
    mysqli_query($conn, $sql);
  }
  else
  {
    $error[]="Passwords not Matches";
  }
  header("location: /Projects/BlindProject/auth/login.php");
}
$Select ="SELECT * FROM `roles`";
$role=mysqli_query($conn, $Select);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
</head>

<body>
    <div class="wrapper">
        <form method="post" class="form-signup">
            <h2 class="form-signup-heading">Sign Up</h2>
            <input type="text" class="form-control" name="username" placeholder="Enter Your Username" required
                autofocus />
            <input type="email" class="form-control" name="email" placeholder="Enter Your Email Address" required />
            <input type="password" class="form-control" name="password" placeholder="Enter Your Password" required />
            <input type="password" class="form-control" name="confirm-password" placeholder="Confirm Password"
                required />
            <?php if(!empty($error)): ?>
            <div style="background-color: black;" class="error">
                <?php foreach($error as $data ): ?>
                <h5><?= $data ?></h5>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
            <input type="text" class="form-control" name="specialization" placeholder="Enter Your Specialization"
                required />
               <?php foreach ($role as $data):  ?>
            <label for="option1"><input value="<?=$data['id']?>" type="radio" id="option1" name="options"><?=$data['statues']?></label>
                <?php endforeach; ?>

            <button class="btn btn-lg btn-primary btn-block" name="signup" type="submit">Sign Up</button>
        </form>
    </div>
</body>

</html>