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

</head>

<body>
    <?php require 'partials/_header.php'; ?>

    <!------------------ notes container------------------>
    <div class="notes-container">
        <?php 
                require 'partials/_connectdb.php'; 
                
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
                {   
                    
                    echo '<table>
                            <tr>
                                <th>S.No</th>
                                <th>Filename</th>
                                <th>Date</th>
                                <th>Options</th>
                            </tr>
                            ';

                    $username = $_SESSION['username'];

                    $query = "SELECT * FROM `notestable` WHERE username = '$username'";
                    $result = mysqli_query($conn, $query);
                    
                    $num = mysqli_num_rows($result);
                    
                    if($num>0)
                    {
                        $sno = 1;
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $ContentDecoded = base64_decode($row['filetext']);
                            
                            echo '<tr>
                                    <td>'.$sno.'</td>
                                    <td class="filename">'. $row['filename'] . '</td>
                                    <td class="filetext">'. $ContentDecoded. '</td>
                                    <td>'. $row['date'] . '</td>
                                    <td>
                                        <button onclick="downloadnote(this)">Download</button>
                                        <button onclick="deletenote(this)">Delete</button>
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