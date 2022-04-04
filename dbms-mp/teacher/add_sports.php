<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Sports</h1>
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
                            <td>Sport Name: </td>
                            <td>
                                <input type="text" name="name">
                            </td>
                        </tr>

                        <tr>
                            <td>Sport ID: </td>
                            <td>
                                <input type="text" name="sportid">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2"> <!--merging 2 columns-->
                                <input type="submit" name="submit" value="Add" class="btn-secondary">
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
    $name = $_POST['name'];
    $sportid = $_POST['sportid'];
    

    //SQL Query to Save the data into database
    $sql = "INSERT INTO sports SET 
        name='$name',
        sportid='$sportid'
    ";
    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    //Check if data is inserted into table or not
    if($res==TRUE)
    {
        //Data Inserted
        //Create a Session Variable to Display Message
        $_SESSION['add'] = "Sport added";
        //Redirect Page to Manage Admin
        header("location:".SITEURL.'teacher/sports.php');
    }
    else
    {
        //Unable to insert data
        //Create a Session Variable to Display Message
        $_SESSION['add'] = "Failed to add sport";
        //Redirect Page to Add Admin
        header("location:".SITEURL.'teacher/add_sports.php');
    }

}
?>