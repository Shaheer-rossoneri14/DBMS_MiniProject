<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Event</h1>
        <br><br>
        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        
        ?>
        <br><br>
        <form action="" method="POST" enctype="multipart/form-data"> <!--enctype says in what form the data should be encrypted while submitting it to server-->
                    <table class="tbl-30">
                        <tr>
                            <td>Event Name: </td>
                            <td>
                                <input type="text" name="name">
                            </td>
                        </tr>

                        <tr>
                            <td>Event ID: </td>
                            <td>
                                <input type="text" name="event_id">
                            </td>
                        </tr>

                        <tr>
                            <td>Sport: </td>
                            <td>
                                <select name="sportid">

                                    <?php 
                                        //Create PHP Code to display categories from Database
                                        //1. Create SQL to get all available sports
                                        $sql = "SELECT * FROM sports";
                                        
                                        //Executing qUery
                                        $res = mysqli_query($conn, $sql);

                                        //Count Rows to check whether we have categories or not
                                        $count = mysqli_num_rows($res);

                                        
                                        if($count>0)
                                        {
                                            //existing categories
                                            while($row=mysqli_fetch_assoc($res))
                                            {
                                                //get the details of sports
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
                                            <option value="0">No Sports Found.</option>
                                            <?php
                                        }

                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Date and Time: </td>
                            <td>
                                <input type="datetime-local" name="eventdt">
                            </td>
                        </tr>
                        <tr>
                            <td>Venue</td>
                            <td>
                                <input type="text" name="venue">
                            </td>
                        </tr>
                        <tr>
                            <td>Entry Fee</td>
                            <td>
                                <input type="text" name="fee">
                            </td>
                        </tr>

                        <tr>
                            <td>Prize</td>
                            <td>
                                <input type="text" name="prize">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2"> <!--merging 2 columns-->
                                <input type="submit" name="submit" value="Add Event" class="btn-secondary">
                            </td>
                        </tr>

                    </table>

        </form>
        <?php 

        //Get the value entered in the form, process it and store it in the database table
            if(isset($_POST['submit']))//isset checks if submit button is clicked or not
            {
                // Button Clicked
                //Get the Data from form
                $event_id = $_POST['event_id']; //$full_name is the name of the row in the database
                $name = $_POST['name'];
                $eventdt = $_POST['eventdt'];
                $venue = $_POST['venue'];
                $fee = $_POST['fee'];
                $prize =$_POST['prize'];
                $sportid = $_POST['sportid'];
                

                //SQL Query to Save the data into database
                $sql = "INSERT INTO events SET 
                    event_id='$event_id',
                    name='$name',
                    eventdt='$eventdt',
                    venue='$venue',
                    fee='$fee',
                    prize='$prize',
                    sportid='$sportid'
                ";
                $res = mysqli_query($conn, $sql) or die(mysqli_error());

                //Check if data is inserted into table or not
                if($res==TRUE)
                {
                    //Data Inserted
                    //Create a Session Variable to Display Message
                    $_SESSION['add'] = "Event added successfully";
                    
                }
                else
                {
                    //Unable to insert data
                    //Create a Session Variable to Display Message
                    $_SESSION['add'] = "Failed to add event";
                    //Redirect Page to Add Admin
                    header("location:".SITEURL.'teacher/add_event.php');
                }

            }
?>