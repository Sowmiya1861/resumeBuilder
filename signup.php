
<!DOCTYPE html>
<html>
  <head>
    <?php
    ini_set('display_errors', 1); error_reporting(E_ALL);
        if(isset($_POST['name']) || isset($_POST['email']) || isset($_POST['password']) || isset($_POST['cpassword'] ))   {
          $name= $_POST['name'];
          $email= $_POST['email'];
          $password= $_POST['password'];
          $cpassword = $_POST['cpassword'];
          
          // Database connection
          $conn = new mysqli('localhost','root','','resumedb');
          if($conn->connect_error){
              echo "$conn->connect_error";
              die("Connection Failed : ". $conn->connect_error);
          } 
          else {
            $stmt = $conn->prepare("insert into signup(name,email,password,cpassword) values(?, ?, ?, ?)");
            
            // Create variables to store the values
            $nameVar = $name;
            $emailVar = $email;
            $passwordVar = $password;
            $cpassVar = $cpassword;
            
            // Pass variables as second argument to bind_param
            $stmt->bind_param("ssss", $nameVar, $emailVar, $passwordVar, $cpassVar);
            
            $execval = $stmt->execute();
            if ($name!='' && $email !='' && $password!='' && $cpassword!='' && $password==$cpassword) {
                header("Location: backuplogin.php");
                exit;
              } 
              else {
                // display error message
                echo '<script type ="text/JavaScript">';
                echo 'alert("Password and Confirm Password does not match!")';
                echo '</script>';
                // echo "Registration failed.";
              }
            $stmt->close();
            $conn->close();
          }    
        }
      ?>
    <title>Sign Up</title>
    <link rel="stylesheet" href="signstyle.css">
    <link rel="shortcut icon" href="images/icon.png" type="image/x-icon"> 
  </head>
  <body>
  <div class="header">
    <nav>
        <ul>
            <li><a href="welcome.html">Home</a></li>
            <li><a href="keypoints.html">Key Points</a></li>
            <li><a href="create.html">Template</a></li>
            <li><a href="contactus.html">Contact</a></li>
        </ul>
    </nav>
  </div>
    <div class="container">
      <h1>Sign Up</h1>
      <form action="signup.php" method="POST">
        <div class="form-group">
          <label for="name" >Name:</label>
          <input type="text" id="name" name="name" placeholder="Enter here" required="">
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" placeholder="Enter here" required="">
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" placeholder="Enter here" required="">
        </div>
        <div class="form-group">
          <label for="confirm-password">Confirm Password:</label>
          <input type="password" id="cpassword" name="cpassword" placeholder="Enter here" required="">
        </div>
        <input type="submit" value="Sign Up" type="submit">
        <center><p>Already having an account? <a href="login.php">Login</a></p></center>
      </form>
    </div>
  </body>
</html>
