
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Log In</title>
  
</head>

<body>
 <form action="log-in.php" method="POST">
    <?php
    include 'connection.php';
    if(isset($_POST['submit'])){
      $email = htmlspecialchars($_POST['email']);
      $pwd =  htmlspecialchars($_POST['pwd']);
      //validation
      $valid = 0;
          //email validation
          $checkEmail = mysqli_query($conn, "SELECT email from Client WHERE email = '$email'");
          if (mysqli_num_rows($checkEmail) == 0) {
            $valid++;
          }
          //password validation
          $checkPwd = mysqli_query($conn, "SELECT pwd from Client WHERE pwd = '$pwd'");
          if (mysqli_num_rows($checkPwd) == 0) {
            $valid++;
          }
          if($valid != 0){
            echo  "<p style=\"color: red;\">wrong email or password</p>";
          }else{
            header("Location: index.php"); 
            exit(); 
          }
        }
    ?>

<center><h1><i><u>SIGN-IN</u></i></h1></center>
  
<div class="form-group">
    <label for="formGroupExampleInput">Email*</label> <br>   
    <input  class="form-control " name="email" type="text"  placeholder="example@gmail.com" style="width: 180%;">
</div>
    <div class="form-group">
    <label for="formGroupExampleInput2">Password*</label> <br>
    <input class="form-control" name="pwd" type="password" placeholder="******" style="width: 180%;"> 
  </div>

</section>
<section>


<div class="d-flex justify-content-center">
  <button  name="submit" type="submit" class="button">Sign-up</button> 
</div>
  <br>
<div style="line-height: 2;">
 
  <p style="text-align: center;">new user? <a href="./inscription.php" style="color: blue;">Signup</a></p>
</div>
</form>
</section>


</body>
</html>