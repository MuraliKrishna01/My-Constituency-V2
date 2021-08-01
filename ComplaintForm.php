
<?php include 'database/config.php';

if(isset($_SESSION['username'])){
    $userLoggedIn = $_SESSION['username'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
}
else{
    header("Location: register.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="Complaintstyle.css" rel="stylesheet" type="text/css">
    
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>

    <title>Complaint Form</title>
    <style>
      .txt{
        border: 2px solid #dddddd ;
        width: 200px;
        padding: 5px 15px;
         margin: 8px 0;
      }
      .image-preview
      {
        width: 300px;
        min-height: 100px;
        border: 2px solid #dddddd ;
        margin-top: auto;
        /*margin-left: 30%; */
        /* Default Test */
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: #cccccc;
      }

    .image-preview__image
    {
      display: none;
      width: 100%;
    }
    .button {
  background-color: #3b89db; /* Green */
  border: none;
  color: white;
  padding: 12px 45px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  }
 
  div.complaint{
    align-content: center;
    margin-left: 30%;
    margin-right: 30%;
    margin-top: auto;
    background-color: rgba(82, 125, 187, 1) ;
    border-radius: 10px;
    border: rgba(255, 255, 255, 0.3);
    box-shadow: 2px 2px 15px rgba(0, 0, 0, 0.3);
    color: black;
  }
  .complaintf{
    margin: 40px;
    
  }
  label{
    font-style: sans-serif;
    font-size: 18px;
    font-style: italic;
  }
  
    </style>
</head>
<body>
  <header>
  
  <div class="header_bar">
  <div class="logo-left" id="logo">
    <a href="#">
                   <img src="assets/images/MCY title.png" height="160" width="240" margin-left="10px">
                    
                </a>
    </div>
  <div class="nav-center">
  
      <div class="dropdown"><?php echo "Hello";?>
        <span><img src="<?php echo $user['profile_pic']; ?>"></span>
        <div class="dropdown-content">
            <div class="dropdown-a">
                <h5><a href="<?php echo $userLoggedIn; ?>"><i style="color:#3875c5;" class="fas fa-user"></i>
                       <?php echo $user ['username']?></a></h5>
                <hr>
                
                <a href="requests.php"><i style="color:#3875c5;" class="fas fa-users"></i>&nbsp;Requests</a>
                
                <hr>
                
                <a href="account_settings.php"><i style="color:#3875c5;" class="fas fa-cog"></i>&nbsp;Settings</a><br><br>
                <a href="home.php"><i style="color:#3875c5;" class="fas fa-sign-out-alt"></i>&nbsp;Logout</a>
            </div>
        </div> 
        <?php echo $user['first_name']; ?><?php echo "!";?> 
        
      </div>
  </div>
  
  
  <nav>
        <a href="Profile.php">
          <i style="color: #3875C5;" class="fas fa-home"></i>&nbsp;Home</a>&nbsp;&nbsp;
          
        <a href="">
            <i style="color: #3875C5;" class="fas fa-envelope"></i>&nbsp;Messages</a>&nbsp;&nbsp;
            
        <a href="">
            <i style="color: #3875C5;" class="fas fa-bell"></i>&nbsp;Notifications</a>
      
  </nav>
  </header>
    <br><br><br><br><br><br><br>
    <div class="complaint">
         
         <form class="complaintf" method="POST">
          <tr>
              <label>
                   VoterID :
                   
              </label><br>
              <label>
                  <input class ="txt" type="text" name="">
                  <br>
              </label>
          </tr>
          <br>
          <tr>
              <label>
                Location of Incident : 
              </label><br>
              <td>
                  <input class ="txt"type="text" name="">
                  <br>
              </td>
          </tr>
          <br>
          <tr>
              
              <label>
                  <label for="category"> Select Category :</label><br><br>
                  <select id="category" default>
                  <option value="">select</option>
                   <option value="ELECTRICITY">ELECTRICITY</option>
                   <option value="ROADS">ROADS</option>
                   <option value="WATER">WATER</option>
                   <option value="INFRASTRUCTURE">INFRASTRUCTURE</option>
                  </select>
                  <br>
              </label>
          </tr>
          <br>
          <tr>
              <label>
                Date and time : 
              </label><br>
              <td>
                  <input class ="txt" type="datetime-local" name="">
                  <br>
              </td>
          </tr>
          <br>
    
      <h1>Image Preview on File Uploads</h1>
      <br>
      <input type="file" name="inpFile" id="inpFile">
      <div class="image-preview" id="imagePreview">
        <img src="" alt="Image Preview " class="image-preview__image">
        <span class="image-preview__default-text">Image Preview </span>
      </div>
      <br>
      <input class="button" type="submit" name="Submit">
        </form> 
      </div>  
   
    <script>
          const inpFile= document.getElementById("inpFile");
          const previewContainer= document.getElementById("imagePreview");
          const previewImage= previewContainer.querySelector(".image-preview__image") ;
          const previewDeaultText= previewContainer.querySelector(".image-preview__default-text") ;
          
          inpFile.addEventListener("change",function() 
          {
            const file = this.files[0] ;
            if(file)
            {
              const reader = new FileReader();
              previewDeaultText.style.display ="none";
              previewImage.style.display="block"

              reader.addEventListener("load",function(){
                console.log(this);
                previewImage.setAttribute("src",this.result);
              });
              reader.readAsDataURL(file);
            }
          })
    </script>
</body>
</html>