<?php 
    session_start();
    require "_connectdb.php";

    if(isset($_POST['resultreq']))
    {
        // echo "result page";
        
        $rollno = $_POST['rollno'];
        $dob = $_POST['dob'];

            $Exists = "SELECT * FROM `result` WHERE `rollno` = '$rollno' AND `dob` = '$dob'";
            $uresults = mysqli_query($conn, $Exists);
            $found = mysqli_num_rows($uresults);

            if($found == 1)
            {
                $ft = mysqli_fetch_assoc($uresults);

                $total = $ft['Maths'] + $ft['Science'] +$ft['Computer Science'] + $ft['English'];
                $percentage = $total/4;

                // echo "Result Found";
                echo '<div name="username">Username :'.$_SESSION['name'].'</div>
                <div name="rollno">Roll No. :'.$ft['rollno'].'</div>
                <div name="dob">DOB : '.$ft['dob'].'</div>
                
                <table class="table" style="width: 81%;align-items: center">
                    <thead>
                    <tr>
                        <th scope="col">Subjects</th>
                        <th scope="col">Score</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">Maths</th>
                        <td>'.$ft['Maths'].'</td>
                           </tr>
                    <tr>
                        <th scope="row">Science</th>
                        <td>'.$ft['Science'].'</td>
                        </tr>
                    <tr>
                        <th scope="row">Computer Science</th>
                        <td>'.$ft['Computer Science'].'</td>
                         </tr>
                    <tr>
                        <th scope="row">English</th>
                        <td>'.$ft['English'].'</td>
                         </tr>
                    </tbody>
                </table>
                <div>
                    Total Marks : '.$total.' 
                </div>
                <div>
                    Percentage : '.$percentage.' %
                </div>';
            }
            else{
                echo "Result not found";
            }
    }

?>