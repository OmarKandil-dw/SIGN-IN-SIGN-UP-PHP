
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Sign Up</title>
</head>
<body>

<section>

<div>
   <center> <h1><i><u>SIGN-UP</i></u></h1></center>

<form action="inscription.php" method="POST">
  <?php
    include "connection.php";
    if(isset($_POST['submit'])){
      //login info
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $adress = $_POST['adress'];
      $phone = $_POST['phone'];
      $email = $_POST['email'];
      $pwd = $_POST['pwd'];
      //client unique id
      $id = uniqid ('OM','true');
      //validation
      $valid = 0;
      //email existing validation
      $checkEmail = mysqli_query($conn, "SELECT email from Client WHERE email = '$email'");
      if (mysqli_num_rows($checkEmail) > 0) {
      echo  "<p style=\"color: red;\">this email is already used</p>";
      $valid++;
      }
      //phone number existing validation
      $checkPhone = mysqli_query($conn, "SELECT phone from Client WHERE phone = '$phone'");
      if (mysqli_num_rows($checkPhone) >  0) {
            echo  "<p style=\"color: red;\">this phone number is already used</p>";
        $valid++;
    }
      if($valid == 0){
        //login info >> database >> client.tb
        $sql = "INSERT INTO Client (id,fname,lname, adress,phone,email, pwd) VALUES ('$id', '$fname', '$lname', '$adress', '$phone', '$email', '$pwd')";
        $query = mysqli_query($conn, $sql);
        header("Location: log-in.php"); 
        die(); 
        // connection closed.
        mysqli_close($conn);
      }
    }
    ?>
  <div class="form-group">
    <label for="formGroupExampleInput">First Name*</label>
    <input name="fname" type="text" class="form-control" id="formGroupExampleInput" placeholder="First name " required>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput"> Last name*</label>
    <input name="lname" type="text" class="form-control" id="formGroupExampleInput" placeholder="Last name" required>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput"> Adresse*</label>
    <input name="adress" type="text" class="form-control" id="formGroupExampleInput" placeholder="Adresse" required>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Phone*</label>
    <input name="phone" type="float" class="form-control" id="formGroupExampleInput" placeholder="0605040302" pattern="^(\+\d{1,2}\s)?\(?\d{3}\)?\d{3}\d{4}$" required>
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput">Email*</label>
    <input name="email" type="text" class="form-control" id="formGroupExampleInput" placeholder="example@gmail.com" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" required>
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput2">Password*</label>
    <input name="pwd" type="password" class="form-control" id="formGroupExampleInput2" placeholder="*****"  required>
  </div>
  
  <div class="d-flex justify-content-center">
  <button name="submit" type="submit" class="button">Sign-up</button>
  </div>
  <p style="text-align: center;">already have an account? <a href="./log-in.php" style="color: blue;">Sign in</a></p>
</form>
</div>
</section>
</body>
</html>