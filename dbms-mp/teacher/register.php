<?php include('../config/constants.php'); ?>
<link rel="stylesheet"  href="../css/login.css">
<div class="center">
      <h1>Register</h1>
      <?php
            if(isset($_SESSION['add'])) //Checks if session is set or not
            {
                echo $_SESSION['add']; //Display the session message
                unset($_SESSION['add']); //Remove Session Message when we refresh the page
            }
        ?>
      
      <form method="post">

          <div class="txt_field">
              <input type="text" name="emp_id" >
              <span></span>
              <label>Employee ID</label>
          </div>

          <div class="txt_field">
              <input type="text" name="full_name">
              <span></span>
              <label>Full Name</label>
          </div>

          <div class="txt_field">
              <input type="text" name="college_id" >
              <span></span>
              <label>College ID</label>
          </div>

            <div class="txt_field">
              <input type="text" name="phno">
              <span></span>
              <label>Mobile No</label>
            </div>

          <div class="txt_field">
            <input type="password" name="password" >
            <span></span>
            <label>Password</label>
          </div>

          <input type="submit" name="submit" value="Register">
          <a href="login.php" class="btn-primary">Already registered</a>
      </form>
    </div>

    <?php 

//Get the value entered in the form, process it and store it in the database table
if(isset($_POST['submit']))//isset checks if submit button is clicked or not
{
    // Button Clicked
    //Get the Data from form
    $full_name = $_POST['full_name']; //$full_name is the name of the row in the database
    $emp_id = $_POST['emp_id'];
    $college_id = $_POST['college_id'];
    $phno = $_POST['phno'];
    $password = md5($_POST['password']); //Password Encryption with MD5
    

    //SQL Query to Save the data into database
    $sql = "INSERT INTO teacher SET 
        full_name='$full_name',
        emp_id='$emp_id',
        college_id='$college_id',
        phno='$phno',
        password='$password'
    ";
    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    //Check if data is inserted into table or not
    if($res==TRUE)
    {
        //Data Inserted
        //Create a Session Variable to Display Message
        $_SESSION['add'] = "Teacher added successfully";
        //Redirect Page to Manage Admin
        header("location:".SITEURL.'teacher/login.php');
    }
    else
    {
        //Unable to insert data
        //Create a Session Variable to Display Message
        $_SESSION['add'] = "Failed to add teacher";
        //Redirect Page to Add Admin
        header("location:".SITEURL.'teacher/register.php');
    }

}

?>