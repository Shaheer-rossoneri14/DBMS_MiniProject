<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Registrations</h1>
        <br /><br />
        <?php 
        
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        
        ?>
        <br><br>
                <br /><br /><br />

                <table class="tbl-full">
                    <tr>
                        <th>Event Name</th>
                        <th>Sport ID</th>
                        <th>Student Name</th>
                        <th>Student USN</th>
                        <th>College Name</th>
                        <th>Phone Number</th>
                    </tr>

                    <?php 

                        //Query to get all the data from database table
                        $sql = "SELECT * FROM register";

                        //Execute Query
                        $res = mysqli_query($conn, $sql);

                        //Count Rows
                        $count = mysqli_num_rows($res);



                        //Check whether we have data in database or not
                        if($count>0)
                        {
                            //We have data in database
                            //get the data and display
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $name = $row['name'];
                                $sportid = $row['sportid'];
                                $sname = $row['sname'];
                                $susn = $row['susn'];
                                $scollege = $row['scollege'];
                                $sphno = $row['sphno'];
                                

                                ?>

                                    <tr>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $sportid; ?></td>
                                        <td><?php echo $sname; ?></td>
                                        <td><?php echo $susn; ?></td>
                                        <td><?php echo $scollege; ?></td>
                                        <td><?php echo $sphno; ?></td>
                                    
                                    </tr>
                                <?php
                            }
                        }
                    
                    ?>
                </table>
    </div>
    
</div>
