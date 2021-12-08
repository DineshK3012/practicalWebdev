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
    <link rel="stylesheet" href="style.css">
</head>

<body class="mobile">
    <?php require "partials/_header.php";  ?>

    <section class="main">
        <h1 class="center" id="headline">
            WELCOME TO STGB KHALSA RESULT MANAGEMENT SYSTEM
        </h1>
        <div class="img">
            <img id="img" src="img1.jpeg" alt="no img">
        </div>

        <!--including footer file -->
        <footer>
            <div class="content">
                <div class="box">
                    <div class="upper">
                        <div class="topic">About us</div>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis laborum vero minima
                            exercitationem maiores
                            hic expedita odio nulla, excepturi placeat, quisquam laudantium dolor quaerat repudiandae?
                        </p>
                    </div>
                    <div class="lower">
                        <div class="topic">Contact us</div>
                        <div class="phone">
                            <a href="#"><i class="fas fa-phone-volume"></i>+91 9814567885</a>
                        </div>
                        <div class="email">
                            <a href="#"><i class="fas fa-envelope"></i>abc@gmail.com</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom">
                <p>Copyright © 2021 SGTB: RMS | All rights reserved</p>
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