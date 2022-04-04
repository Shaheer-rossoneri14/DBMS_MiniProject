<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Event</h1>
        <br> <br>
        <?php 
            if(isset($_GET['event_id']))
            {
                //Get the ID and all other details
                $event_id = $_GET['event_id'];
                //Create SQL Query to get all other details of the respective id
                $sql = "SELECT * FROM events WHERE event_id=$event_id";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Count the Rows 
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    //Get all the data
                    $row=mysqli_fetch_assoc($res);
                    $name=$row['name'];
                    $eventdt=$row['eventdt'];
                    $venue=$row['venue'];
                    $sportid=$row['sportid'];
                    $eventdt=$row['eventdt'];
                }
                else
                {
                    //redirect to manage category
                    $_SESSION['no-event-found'] = "<div class='error'>Event not Found.</div>";
                    header('location:'.SITEURL.'teacher/manage_events.php');
                }

            }
            else
            {
                //redirect to manage category
                header('location:'.SITEURL.'teacher/manage_events.php');
            }
        
        ?>
        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Event ID: </td>
                    <td>
                        <input type="text" name="event_id" value="<?php echo $event_id; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Event Name: </td>
                    <td>
                        <input type="text" name="name" value="<?php echo $name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Sport ID: </td>
                    <td>
                        <input type="text" name="sportid" value="<?php echo $sportid; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Venue: </td>
                    <td>
                        <input type="text" name="venue" value="<?php echo $venue; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Date and Time: </td>
                    <td>
                        <input type="datetime-local" name="eventdt" value="<?php echo $eventdt; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2"> <!--merging 2 columns-->
                        <input type="submit" name="submit" value="Update Event" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
        <?php 
        
        //update newly entered values
            if(isset($_POST['submit']))
            {
                //Get all the values from form
                $event_id = $_POST['event_id']; //$full_name is the name of the row in the database
                $name = $_POST['name'];
                $eventdt = $_POST['eventdt'];
                $venue = $_POST['venue'];
                $sportid = $_POST['sportid'];

                //SQL Query to Save the data into database
                    $sql = "UPDATE events SET 
                    event_id='$event_id',
                    name='$name',
                    eventdt='$eventdt',
                    venue='$venue',
                    sportid='$sportid'
                ";
                $res = mysqli_query($conn, $sql) or die(mysqli_error());

                //Check if data is inserted into table or not
                if($res==TRUE)
                {
                    //Data Inserted
                    //Create a Session Variable to Display Message
                    $_SESSION['add'] = "Event updated successfully";
                    //Redirect Page to Manage Admin
                    header("location:".SITEURL.'teacher/');
                }
                else
                {
                    //Unable to insert data
                    //Create a Session Variable to Display Message
                    $_SESSION['add'] = "Failed to update event";
                    //Redirect Page to Add Admin
                    header("location:".SITEURL.'teacher/add_event.php');
                }

                }
                ?>
    </div>
        </div>