<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <link rel="stylesheet" href="loginstyle.css">
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
      <h1>Login</h1>
      <form action="backuplogin.php" method="post">
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" placeholder="Enter here" required>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" placeholder="Enter here" required>
        </div>
        <input type="submit" value="Login" name="save" type="submit" button onclick="validate()">
        <p>Don't have an account? <a href="signup.php">Sign up</a></p>
      </form>
    </div>
    <?php
    ini_set('display_errors', 1); error_reporting(E_ALL);
      $connect=mysqli_connect("localhost","root","","resumedb") or die("Connection Failed");
      if(!empty($_POST['save']))
      {
        $email=$_POST['email'];
        $Password=$_POST['password'];
        $query="select * from signup where email='$email' and password='$Password'";
        $result=mysqli_query($connect,$query);
        $count=mysqli_num_rows($result); 
        if($count>0)
        {
          echo '<script type ="text/JavaScript">';
          echo 'alert("Welcome!")';
          echo '</script>';
          header("location: http://localhost/resume/welcome.html");

      //    header("Location: userdash.php");
          echo "Login  Successful";
        }
        else
        {
          echo '<script type ="text/JavaScript">';
          echo 'alert("Please check your email or password!")';
          echo '</script>';
          
        //  echo "Login Not Successful";
        
        }
      }
    ?> 
  </body>
</html>
