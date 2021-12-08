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
                                    <td class="filename">'. $row['rollno'] . '</td>
                                    <td class="filename">'. $row['dob'] . '</td>
                                    <td class="filename">'. $row['Maths'] . '</td>
                                    <td class="filename">'. $row['Science'] . '</td>
                                    <td class="filename">'. $row['English'] . '</td>
                                    <td class="filename">'. $row['Computer Science'] . '</td>
                                    <td>'. $row['date'] . '</td>
                                    <td>
                                        <button onclick="deleteRecord(this)">Delete</button>
                                        <button onclick="updateRecord(this)">Delete</button>
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


    <!-- Javascript files  -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- script for creating pdf -->
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

</body>

</html>