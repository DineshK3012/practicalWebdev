<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGTB: Result Management System</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">

</head>

<body class="mobile">
    <?php require "partials/_header.php";  ?>

    <section class="main">
        <h1 class="center" id="headline">
            Welcome To SGTB Result Management System
        </h1>
        <div class="img">
            <img id="img" src="img1.jpeg" alt="img">
        </div>

        <!--including footer file -->
        <footer>
            <div class="content">
                <p>Copyright © 2021 | SGTB: Result Management System | All rights reserved |</p>
            </div>
        </footer>

        <script src="script.js"></script>

        <!-- jquery script -->
        <script src="js/jquery-3.6.0.js"></script>
        <script>
        //logout script
        $(document).ready(function() {
            $('#logout').click(function() {
                $.ajax({
                    url: 'partials/_logout.php',
                    method: 'POST',
                    data: {
                        logoutRequest: true,
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            });
        });
        </script>
</body>

</html>