  <?php
session_start();
include('connectivity.php');
?>


<?php
if (isset($_POST['email']) && isset($_POST['pswd1']))
  {
  $myuser=$_POST['email'];
  $mypass=$_POST['pswd1'];



 // $_SESSION['email']=$_POST['email'];
 //$_SESSION['pswd1']=$_POST['pswd1'];

  $sql="SELECT * FROM `tbl_registration` where reg_email='$myuser' and password='$mypass'";
  $result=mysqli_query($query,$sql);

if(mysqli_num_rows($result) === 1)
{
  while($row=mysqli_fetch_array($result)){


if ($row['reg_email'] == $myuser && $row['password'] == $mypass)
{
  if($row['role_id']== 0){
    session_start();

    $_SESSION['id']=$row['reg_id'];


header("location:./admin/index.php");

  
}
else if($row['role_id']== 3)
{
  session_start();

    $_SESSION['id']=$row['reg_id'];
  header("location:./staffs/index.php");
}
// else if($row['role_id']== 1)
// {
//   session_start();

//     $_SESSION['id']=$row['reg_id'];
//   header("location:./staffs/index.php");
// }
else if($row['role_id']== 2)
{
session_start();

    $_SESSION['id']=$row['reg_id'];

header("location:./Freshers/about.php");
}
else
{
 
}
    }
else{
     ?>
  <script type="text/javascript">
            alert("Invalid Username Or Password!!!.");
            window.location = "login.php";
        </script> 
        <?php
exit();
}


}
}



  
  
  
}

  ?>



<!DOCTYPE html>
<html lang="en">

<head>

  <title>FlickCom:Signin</title>
  <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 11]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  <!-- Meta -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="" />
  <meta name="keywords" content="">
  <meta name="author" content="Phoenixcoded" />
  <!-- Favicon icon -->
  

  <!-- vendor css -->
  <link rel="stylesheet" href="css/style1.css">
  
  


</head>
<body>
<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
  <div class="auth-content text-center">
    
    <div class="card borderless">
      <div class="row align-items-center ">
        <div class="col-md-12">
          <div class="card-body">
            <form method="post" action="" name="login" class="registartion-form" onsubmit="return (valid())">
            <h4 class="mb-3 f-w-400">Signin</h4>
            <hr>
            <div class="form-group mb-3">
              <input type="text" class="form-control" name="email" id="email" placeholder="Email address">
            </div>
            <div class="form-group mb-4">
              <input type="password" class="form-control" id="pswd1" name="pswd1" placeholder="Password">
            </div>
            
            <button class="btn btn-block btn-primary mb-4">Signin</button>
            <hr>
           
            <p class="mb-0 text-muted">Don’t have an account? <a href="signup.php" class="f-w-400">Signup</a></p>
            <p class="mb-0 text-muted">Forgot password? <a href="forgot_password.php" class="f-w-400">Click here</a></p>
            
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>

<script src="assets/js/pcoded.min.js"></script>



</body>

</html>