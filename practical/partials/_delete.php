<?php 
    require '_connectdb.php';

    if(isset($_POST['deleteRequest']) && $_POST['deleteRequest'] == true)
    {
        $rollno = $_POST['rollno'];
        $dob = $_POST['dob'];

        $query = "DELETE FROM `result` WHERE `rollno` =  '$rollno' AND `dob` = '$dob'";
        $result = mysqli_query($conn, $query);

        if($result)
        {
            echo "Deleted successfully";
        }
        else{
            echo "Error in deleting --> ".mysqli_error($conn);
        }
    }
?>