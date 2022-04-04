<?php include('../config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet"  href="../css/login.css">
  </head>
  <body>
    <div class="center">
      <h1>Login</h1>

      <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
      ?>

      <form action="" method="post">
        <div class="txt_field">
          <input type="text" name="emp_id">
          <span></span>
          <label>Employee ID</label>
        </div>

        <div class="txt_field">
          <input type="password" name="password">
          <span></span>
          <label>Password</label>
        </div>

        

        <input type="submit" name="submit" value="Login">
        
      </form>
    </div>

  </body>
</html>

<?php 

    
    if(isset($_POST['submit']))
    {
        //Process for Login
        //Get the Data from Login form
        $emp_id = $_POST['emp_id'];
        $password = md5($_POST['password']);

        //SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM teacher WHERE emp_id='$emp_id' AND password='$password'";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Count rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $emp_id; //To check whether the user is logged in or not and logout will unset it

            
            header('location:'.SITEURL.'teacher/');
        }
        else
        {
            
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
            
            header('location:'.SITEURL.'teacher/login.php');
        }


    }

?>