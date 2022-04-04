<?php include('partials-front/menu.php'); ?>
        <div class="main-content">
            <div class="wrapper">
                <h1>EVENTS</h1>
                <br><br>

                <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];//Prints login successful message
                    unset($_SESSION['login']);//Removes message when page is refreshed
                }
                ?>
                <br><br>

                
<?php
$query= "SELECT * FROM events";
$query_run=mysqli_query($conn,$query);
$check_entries = mysqli_num_rows($query_run)>0;

if($check_entries)
{
        while($row=mysqli_fetch_array($query_run))
        {
            $event_id = $row['event_id'];
            ?>
            <div class="col-4">
            <h2>Event Name: <?php echo $row['name'];?> </h2>
            <h2>Sport ID: <?php echo $row['sportid'];?> </h2>
            <h3>Date and time: <?php echo $row['eventdt'];?></h3>
            <h3>Fee: <?php echo $row['fee'];?></h3>
            <h4>Venue:<?php echo $row['venue'];?> </h4>
            <a href="<?php echo SITEURL; ?>register_event.php?event_id=<?php echo $event_id; ?>" class="btn-primary">Register</a>
            </div>
            <?php
        }
}
else{
    echo "No events";
    }
?>
