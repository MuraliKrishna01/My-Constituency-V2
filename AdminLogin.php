<?php
   include("database/AdminConfig.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT * FROM Adminuser WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
        
         
         $_SESSION['Admin_user'] = $myusername;
         
         header("location: Adminhome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href=" assets/css/AdmnLogin.css" rel="stylesheet">
    <title>Transparent Login Form </title>
</head>
<body>
    <div class="Login-box" >
    <form method = "post">
        <h1>Admin Login</h1>
        <div class="textbox">
            <input type="text"  placeholder="Voter ID"  name="username" value="">
        </div>
    
        
        <div class="textbox">
            <input type="password"  placeholder="Password"  name="password" value="">
        </div>
        
        <button class="btn1" type="submit" name="Login" >Login Now</button>
        
   
</form>
</body>
</html> 