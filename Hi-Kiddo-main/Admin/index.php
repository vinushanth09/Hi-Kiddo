<?php
// Start the session
session_start();
?>
<?php
include 'Database/dbconnect.php';
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
  $result = $con->query("select * from admin where email = '$email'");

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row['password'] == $password) {

      header("location:adminPanel.php");
      $con->close();
    } else {
      echo "<script>alert('wrong password');</script>";
      $con->close();
       
    }
  }
}


?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="CSS/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sign in</title>
  <style>
    .containerBG {
      background-image: url("Images/6.jpg");
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: 100%;



    }

    #notifypop {
      display: none;
    }



    .snow {
      /* width:100%;
            height: 100%; */
      border: 1px solid rgba(255, 255, 255, 0.1);
      background-image: url("data:image/svg+xml,%3Csvg version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 50 50' style='enable-background:new 0 0 50 50%3B' xml:space='preserve'%3E%3Cstyle type='text/css'%3E.st1%7Bopacity:0.3%3Bfill:%23FFFFFF%3B%7D.st3%7Bopacity:0.1%3Bfill:%23FFFFFF%3B%7D%3C/style%3E%3Ccircle class='st1' cx='5' cy='8' r='1'/%3E%3Ccircle class='st1' cx='38' cy='3' r='1'/%3E%3Ccircle class='st1' cx='12' cy='4' r='1'/%3E%3Ccircle class='st1' cx='16' cy='16' r='1'/%3E%3Ccircle class='st1' cx='47' cy='46' r='1'/%3E%3Ccircle class='st1' cx='32' cy='10' r='1'/%3E%3Ccircle class='st1' cx='3' cy='46' r='1'/%3E%3Ccircle class='st1' cx='45' cy='13' r='1'/%3E%3Ccircle class='st1' cx='10' cy='28' r='1'/%3E%3Ccircle class='st1' cx='22' cy='35' r='1'/%3E%3Ccircle class='st1' cx='3' cy='21' r='1'/%3E%3Ccircle class='st1' cx='26' cy='20' r='1'/%3E%3Ccircle class='st1' cx='30' cy='45' r='1'/%3E%3Ccircle class='st1' cx='15' cy='45' r='1'/%3E%3Ccircle class='st1' cx='34' cy='36' r='1'/%3E%3Ccircle class='st1' cx='41' cy='32' r='1'/%3E%3C/svg%3E");
      background-position: 0px 0px;
      animation: animatedBackground 10s linear infinite;
    }

    /* .snow div {
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 50 50' style='enable-background:new 0 0 50 50%3B' xml:space='preserve'%3E%3Cstyle type='text/css'%3E.st1%7Bopacity:0.7%3Bfill:%23FFFFFF%3B%7D.st3%7Bopacity:0.1%3Bfill:%23FFFFFF%3B%7D%3C/style%3E%3Ccircle class='st3' cx='4' cy='14' r='1'/%3E%3Ccircle class='st3' cx='43' cy='3' r='1'/%3E%3Ccircle class='st3' cx='31' cy='30' r='2'/%3E%3Ccircle class='st3' cx='19' cy='23' r='1'/%3E%3Ccircle class='st3' cx='37' cy='22' r='1'/%3E%3Ccircle class='st3' cx='43' cy='16' r='1'/%3E%3Ccircle class='st3' cx='8' cy='45' r='1'/%3E%3Ccircle class='st3' cx='29' cy='39' r='1'/%3E%3Ccircle class='st3' cx='13' cy='37' r='1'/%3E%3Ccircle class='st3' cx='47' cy='32' r='1'/%3E%3Ccircle class='st3' cx='15' cy='4' r='2'/%3E%3Ccircle class='st3' cx='9' cy='27' r='1'/%3E%3Ccircle class='st3' cx='30' cy='9' r='1'/%3E%3Ccircle class='st3' cx='25' cy='15' r='1'/%3E%3Ccircle class='st3' cx='21' cy='45' r='2'/%3E%3Ccircle class='st3' cx='42' cy='45' r='1'/%3E%3C/svg%3E");
          
            animation: animatedBackground 15s linear infinite;
        } */

    @keyframes animatedBackground {
      0% {
        background-position: 0 0;
      }

      100% {
        background-position: 0px 300px;
      }
    }
  </style>
</head>

<body style="  background-image: url('Images/6.jpg');background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100%;" class="">
  <div class="main">
    <p class="sign">Sign in</p>

    <form class="form1" method="post">
      <input class="user " type="text" name="email" placeholder="example@example.com">
      <input class="pass" type="password" name="password" placeholder="Example123">
      <button class="submit" name="login" value="Sign In">Submit</button>
      <button class="Organization" hidden>Organization</button>
    </form>

  </div>




</body>

</html>