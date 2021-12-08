<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">


    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    .container {
        width: 100%;
    }

    .container table {
        width: 95%;
        margin: 1rem auto;
        color: var(--dark);
        /* background-color: white; */
        color: white;
        border: 1px solid white;
        border-radius: 3px;
        padding: 1rem 0.5rem;
    }

    .container table th {
        font-size: 1.2rem;
        margin: 0.5rem 0;
    }

    .container table tr {
        font-size: 1rem;
        margin: 0.5rem 0;
    }

    .container table tr .filetext {
        display: none;
    }

    .container table tr button {
        font-size: 0.9rem;
        font-weight: 400;
        padding: 0.5rem;
        margin: 0.5rem 0.3rem;
        outline: none;
        border: none;
        background-color: var(--primary);
    }

    .container table tr button:hover {
        box-shadow: inset 0px 0px 3px rgba(0, 0, 0, 0.6);
    }
    </style>

</head>

<body>
    <?php require 'partials/_header.php'; ?>

    <!------------------ notes container------------------>
    <div class="container">
        <?php 
                require 'partials/_connectdb.php'; 
                
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['role'] == 'teacher')
                {   
                    echo '<table>
                            <tr>
                                <th>S.No</th>
                                <th>Roll No.</th>
                                <th>D.O.B</th>
                                <th>Maths</th>
                                <th>Science</th>
                                <th>English</th>
                                <th>Computer Science</th>
                                <th>Date</th>
                                <th>Options</th>
                            </tr>
                            ';
                    $query = "SELECT * FROM `result`";
                    $result = mysqli_query($conn, $query);
                    
                    $num = mysqli_num_rows($result);
                    
                    if($num>0)
                    {
                        $sno = 1;
                        while($row = mysqli_fetch_assoc($result))
                        {   
                            echo '<tr>
                                    <td>'.$sno.'</td>
                                    <td class="rollno">'. $row['rollno'] . '</td>
                                    <td class="dob">'. $row['dob'] . '</td>
                                    <td>'. $row['Maths'] . '</td>
                                    <td>'. $row['Science'] . '</td>
                                    <td>'. $row['English'] . '</td>
                                    <td>'. $row['Computer Science'] . '</td>
                                    <td>'. $row['date'] . '</td>
                                    <td>
                                        <button onclick="updateRecord(this)">Update</button>
                                        <button onclick="deleteRecord(this)">Delete</button>
                                    </td>
                                </tr>';
                            $sno++;
                        }
                    }
                    echo '</table>';
                }
                else
                {
                    echo '<h1>You Must have to Login First</h1>';
                }
            ?>
    </div>

    <!-- jquery script -->
    <script src="js/jquery-3.6.0.js"></script>

    <script>
    //script to delete the note form the database
    function deleteRecord(e) {
        let rollno = e.parentElement.parentElement.querySelector('.rollno').innerHTML;
        let dob = e.parentElement.parentElement.querySelector('.dob').innerHTML;
        console.log(rollno);
        console.log(dob);

        $.ajax({
            url: 'partials/_delete.php',
            method: 'POST',
            data: {
                deleteRequest: true,
                rollno: rollno,
                dob: dob,
            },
            success: function(data) {
                // console.log(data);
                location.reload();
            }
        });
    }
    </script>

</body>

</html>