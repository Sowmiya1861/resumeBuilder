<?php
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
        } else {
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
                header("Location: login.php");
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