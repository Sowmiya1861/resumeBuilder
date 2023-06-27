<?php
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

          echo "Login  Successful";
        }
        else
        {
          echo '<script type ="text/JavaScript">';
          echo 'alert("Please check your email or password!")';
          echo '</script>';
        }
      }
    ?> 