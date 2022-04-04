<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
<style>
  label {
  display: flex;
  flex-direction: row;
  text-align: right;
  width: 400px;
  line-height: 26px;
  margin-bottom: 10px;
}

input {
  height: 20px;
  
}
</style>
  
</head>
<body>
      <h1>Update Result</h1>
      <br><br><br>
      <form method="post">
      <label>Event Name</label>
              <select name="name">
                            <?php 
                                //Create PHP Code to display categories from Database
                                //1. CReate SQL to get all active categories from database
                                $sql = "SELECT * FROM events";
                                $res = mysqli_query($conn, $sql);
                                $count = mysqli_num_rows($res);

                                //IF count is greater than zero, we have categories else we do not have categories
                                if($count>0)
                                {
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        //get the details of categories
                                        $event_id = $row['event_id'];
                                        $name = $row['name'];
                                        ?>
                                        <option value="<?php echo $name; ?>"><?php echo $name; ?></option>
                                        <?php
                                    }
                                }
                                else
                                {
                                    
                                    ?>
                                    <option value="0">No Events Found</option>
                                    <?php
                                }
                            ?>
                        </select>
              <br><br>
              <label>Sport</label>
              <select name="sportid">
                            <?php 
                                //Create PHP Code to display categories from Database
                                //1. CReate SQL to get all active categories from database
                                $sql = "SELECT * FROM sports";
                                
                                //Executing qUery
                                $res = mysqli_query($conn, $sql);

                                //Count Rows to check whether we have categories or not
                                $count = mysqli_num_rows($res);

                                //IF count is greater than zero, we have categories else we do not have categories
                                if($count>0)
                                {
                                    //existing categories
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        //get the details of categories
                                        $sportid = $row['sportid'];
                                        $name = $row['name'];
                                        ?>
                                        <option value="<?php echo $sportid; ?>"><?php echo $name; ?></option>
                                        <?php
                                    }
                                }
                                else
                                {
                                    
                                    ?>
                                    <option value="0">No Sports Found</option>
                                    <?php
                                }
                            ?>
                        </select>
                        <br><br>

          <label>Winner</label>
          <select name="winner">
                            <?php 
                                //Create PHP Code to display categories from Database
                                //1. CReate SQL to get all active categories from database
                                $sql = "SELECT * FROM register";
                                $res = mysqli_query($conn, $sql);

                                //Count Rows to check whether we have categories or not
                                $count = mysqli_num_rows($res);

                                //IF count is greater than zero, we have categories else we do not have categories
                                if($count>0)
                                {
                                    //existing categories
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        //get the details of categories
                                        
                                        $sname = $row['sname'];

                                        ?>

                                        <option value="<?php echo $sname; ?>"><?php echo $sname; ?></option>

                                        <?php
                                    }
                                }
                                else
                                {
                                    
                                    ?>
                                    <option value="0">No Participants Found</option>
                                    <?php
                                }
                            

                                //Display on Drpopdown
                            ?>

                        </select>
              
          <br><br>
          <input type="submit" name="submit" value="Add">
      </form>
      <?php 

//Get the value entered in the form, process it and store it in the database table
if(isset($_POST['submit']))//isset checks if submit button is clicked or not
{
    // Button Clicked
    //Get the Data from form
    $name = $_POST['name'];
    $sportid = $_POST['sportid'];
    $winner = $_POST['winner'];
    

    //SQL Query to Save the data into database
    $sql = "INSERT INTO result SET 
        name='$name',
        sportid='$sportid',
        winner='$winner'
    ";
    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    //Check if data is inserted into table or not
    if($res==TRUE)
    {
        //Data Inserted
        //Create a Session Variable to Display Message
        $_SESSION['add'] = "Teacher added successfully";
        //Redirect Page to Manage Admin
        header("location:".SITEURL.'teacher/');
    }
    else
    {
        //Unable to insert data
        //Create a Session Variable to Display Message
        $_SESSION['add'] = "Failed to add teacher";
        //Redirect Page to Add Admin
        header("location:".SITEURL.'teacher/add_event.php');
    }

}
?>
    </div>
</body>



