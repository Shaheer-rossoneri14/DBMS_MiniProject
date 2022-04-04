<?php include ('partials-front/menu.php')?>
<div class="main-content">
            <div class="wrapper">
            <?php
    //check whether food id is set or not
    if(isset($_GET['event_id']))
    {
        //Get the details and display it in the order form
        $event_id=$_GET['event_id'];
        $sql="SELECT * FROM events WHERE event_id=$event_id";
        //execute the query 
        $res=mysqli_query($conn, $sql);
        //count the rows
        $count=mysqli_num_rows($res);
        //check whether the data is available or not
        if($count==1)
        {
            //data is present
            //get data from database
            $row=mysqli_fetch_assoc($res);
            $name=$row['name'];
            $eventdt=$row['eventdt'];
            $venue=$row['venue'];
            $sportid=$row['sportid'];
            $fee=$row['fee'];

        }
        else{
            //food not available and redirect to home
            header('location:'.SITEURL);
        }
    }
    else{
        header('location:'.SITEURL);
    }
?>

    <!-- place order-->
    <section class="place-order text-center">
        <div class="container">
            <h2 class="text-center text-white">Register Here</h2>
            <br><br><br>
            <form action="" method="POST" class="order">
            <fieldset>
                    <legend>Event details</legend>
                    <br><br>
                    <div class="description">
                        <input type="text" name="name" value="<?php echo $name; ?>"> 
                        <input type="text" name="sportid" value="<?php echo $sportid; ?>">
                        <input type="text" name="eventdt" value="<?php echo $eventdt; ?>">
                        <input type="text" name="venue" value="<?php echo $venue; ?>">
                        <input type="text" name="fee" value="<?php echo $fee; ?>">
                    </div>
                    <br><br>
                </fieldset>
                

                <fieldset>
                <legend>Student details</legend>
                    
                    <div class="order-label">Name</div>
                    <input type="text" name="sname"  class="input-responsive" required>

                    <div class="order-label">USN</div>
                    <input type="text" name="susn"  class="input-responsive" required>

                    <div class="order-label">College Name</div>
                    <input type="text" name="scollege"  class="input-responsive" required>

                    <div class="order-label">Contact Number</div>
                    <input type="text" name="sphno" class="input-responsive" required>

                    <br><br>

                    <input type="submit" name="submit" value="Confirm" class="btn btn-primary">
                </fieldset>
            </form>
            <?php 

                
                if(isset($_POST['submit']))
                {
                    // Get all the details from the form

                    $name = $_POST['name'];
                    $sportid = $_POST['sportid'];
                    $venue = $_POST['venue'];
                    $sname = $_POST['sname'];
                    $susn = $_POST['susn'];
                    $scollege = $_POST['scollege'];
                    $sphno = $_POST['sphno'];


                    //Save the Order in Databaase
                    //Create SQL to save the data
                    $sql2 = "INSERT INTO register SET 
                        
                        name = '$name',
                        sportid = '$sportid',
                        
                        sname = '$sname',
                        susn = '$susn',
                        scollege = '$scollege',
                        sphno = '$sphno',
                        venue = '$venue'
                    ";
                    //Execute the Query
                    $res2= mysqli_query($conn, $sql2);

                    //Check whether query executed successfully or not
                    if($res2==true)
                    {
                        //Query Executed and Order Saved
                        $_SESSION['order'] = "<div class='success text-center'>Thanks for registering! </div>";
                        header('location:'.SITEURL);
                    }
                    else
                    {
                        //Failed to Save Order
                        $_SESSION['order'] = "<div class='error text-center'>Failed to register</div>";
                        header('location:'.SITEURL);
                    }

                }
            
            ?>


        </div>
    </section>
   