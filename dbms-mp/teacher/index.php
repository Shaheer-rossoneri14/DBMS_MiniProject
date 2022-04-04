<?php include('partials/menu.php'); ?>
        <div class="main-content">
            <div class="wrapper">
                <h1>DASHBOARD</h1>
                <br><br>

                <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];//Prints login successful message
                    unset($_SESSION['login']);//Removes message when page is refreshed
                }
                ?>
                <br><br>
                <div class="col-4 text-center">
                <?php 
                //Sql Query 
                $sql = "SELECT * FROM sports";
                //Execute Query
                $res = mysqli_query($conn, $sql);
                //Count Rows 
                $count = mysqli_num_rows($res);
                            ?>

                <h1><?php echo $count; ?></h1>
                <br />
                SPORTS
                </div>

                <div class="col-4 text-center">
                <?php 
                    //Sql Query 
                    $sql2 = "SELECT * FROM events";
                    //Execute Query
                    $res2 = mysqli_query($conn, $sql2);
                    //Count Rows 
                    $count2 = mysqli_num_rows($res2);
                ?>
                <h1><?php echo $count2; ?></h1>
                <br />
                EVENTS
                </div>

                <div class="col-4 text-center">
                <?php 
                    //Sql Query 
                    $sql3 = "SELECT * FROM register";
                    //Execute Query
                    $res3 = mysqli_query($conn, $sql3);
                    //Count Rows 
                    $count3 = mysqli_num_rows($res3);
                ?>

                <h1><?php echo $count3; ?></h1>
                <br />
                REGISTRATIONS
                </div>

                <div class="clearfix"></div>

</div>
</div>