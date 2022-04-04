<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Events</h1>

        <br /><br />
        <?php 
        
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['no-event-found']))
            {
                echo $_SESSION['no-event-found'];
                unset($_SESSION['no-event-found']);
            }

            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            if(isset($_SESSION['remove']))
            {
                echo $_SESSION['remove'];
                unset($_SESSION['remove']);
            }

            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

        ?>
        <br><br>

                <!-- Button to Add Admin -->
                <a href="<?php echo SITEURL; ?>teacher/add_event.php" class="btn-primary">Add Event</a>

                <br /><br /><br />

                <table class="tbl-full">
                    <tr>
                        <th>Event Id</th>
                        <th>Event Name</th>
                        <th>Sport ID</th>
                        <th>Date and Time</th>
                        <th>Actions</th>
                    </tr>
                    <?php 

                        //Query to get all the data from database table
                        $sql = "SELECT * FROM events";

                        //Execute Query
                        $res = mysqli_query($conn, $sql);

                        //Count Rows
                        $count = mysqli_num_rows($res);

                        //Create Serial Number Variable and assign value as 1
                        $sn=1;

                        //Check whether we have data in database or not
                        if($count>0)
                        {
                            //We have data in database
                            //get the data and display
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $event_id=$row['event_id'];
                                $name = $row['name'];
                                $sportid =$row['sportid'];
                                $eventdt=$row['eventdt']; 

                                ?>

                                    <tr>


                                        <td><?php echo $event_id; ?></td>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $sportid; ?></td>
                                        <td><?php echo $eventdt; ?></td>
                                        
                                        <td>
                                            <a href="<?php echo SITEURL; ?>teacher/update_event.php?event_id=<?php echo $event_id; ?>" class="btn-secondary">Update Event</a>
                                            <a href="<?php echo SITEURL; ?>teacher/delete_event.php?event_id=<?php echo $event_id; ?>" class="btn-secondary">Delete Event</a>
                                            
                                        </td>
                                    </tr>

                                <?php

                            }
                        }
                        else
                        {
                            //No data present in table
                            //We'll display the message inside table
                            ?>

                            <tr>
                                <td colspan="6"><div class="error">No Events.</div></td>
                            </tr>

                            <?php
                        }
                    
                    ?>

                    

                    
                </table>
    </div>
    
</div>
