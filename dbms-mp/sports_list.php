<?php include('partials-front/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>SPORTS</h1>

        <br /><br />
        <?php 
        
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>

                <table class="tbl-full">
                    <tr>
                        <th>Sport Name</th>
                        <th>Sport ID</th>
                    </tr>
                    <?php 

                        //Query to get all the data from database table
                        $sql = "SELECT * FROM sports";

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
                                $name = $row['name'];
                                $sportid =$row['sportid']; 

                                ?>

                                    <tr>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $sportid; ?></td>
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
                                <td colspan="6"><div class="error">Sports table is empty.</div></td>
                            </tr>

                            <?php
                        }
                    
                    ?>
                </table>
    </div>
    
</div>
