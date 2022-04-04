<?php 
    //Include Constants File
    include('../config/constants.php');

    //echo "Delete Page";
    //Check whether the id and image_name value is set or not
    if(isset($_GET['event_id']))
    {
        //Get the Value and Delete
        //echo "Get Value and Delete";
        $event_id = $_GET['event_id'];

        //Delete Data from Database
        //SQL Query to Delete Data from Database
        $sql = "DELETE FROM events WHERE event_id=$event_id";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Check whether the data is delete from database or not
        if($res==true)
        {
            //SEt Success MEssage and REdirect
            $_SESSION['delete'] = "<div class='success'>Event Deleted Successfully.</div>";
            //Redirect to Manage Category
            header('location:'.SITEURL.'teacher/index.php');
        }
        else
        {
            //SEt Fail MEssage and Redirecs
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Event.</div>";
            //Redirect to Manage Category
            header('location:'.SITEURL.'teacher/index.php');
        }

 

    }
    else
    {
        //redirect to Manage Category Page
        header('location:'.SITEURL.'teacher/index.php');
    }
?>