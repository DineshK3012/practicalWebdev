<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"> -->

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #232323;
            color: white;
        }

        .form-btn {
            width: 80%;
            margin: auto;
            text-align: center;
        }

        .form-btn #btn {
            width: 20%;
            margin: 0.5rem auto;
            padding: 0.3rem 0;
            font-size: 20px;
            font-weight: 500;
            color: white;
            background-color: orangered;
            border: none;
            outline: none;
        }

        .form-btn #btn:hover {
            font-size: 19px;
            padding: 0.35rem 0;
            box-shadow: inset 0px 0px 6px rgba(53, 40, 40, 0.4);
        }

        .form-btn .form-status {
            font-size: 24px;
            margin: 2rem auto;
        }

        .timer {
            /* width: 50%; */
            margin: auto;
            margin-bottom: 0;
            position: absolute;
            top: 2%;
            right: 4%;
        }

        .timer p {
            color: orangered;
            font-size: 2.4rem;
            font-weight: bold;
            text-align: center;
        }

        .container {
            display: flex;
            flex-direction: column;
            text-align: center;
            position: relative;
            width: 80%;
            margin: 0% auto;
        }

        .container h1 {
            text-align: center;
            font-size: 2.4rem;
            font-weight: 600;
        }

        .container>div {
            width: 65%;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .container>div label {
            font-size: 18px;
            font-weight: 500;
            text-align: left;
            margin: 0.4rem 0.5rem;
            margin-top: 0.8rem;
            /* color: rgb(175, 9, 9); */
            color: white;
        }

        .container>div input::-webkit-outer-spin-button,
        .container>div input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .container>div input,
        .container>div select,
        .container>div textarea {
            width: 100%;
            font-size: 15px;
            padding: 7px;
            border: none;
            outline: none;
            background-color: rgb(248, 237, 237);
        }

        .container>div div img {
            vertical-align: bottom;
            margin: 0 2rem;
        }

        .container>div #captcha {
            width: 50%;
        }

        .container button,
        .container>div input[type=button] {
            width: 50%;
            margin: 1rem auto;
            padding: 0.3rem 0;
            font-size: 20px;
            font-weight: 500;
            color: white;
            background-color: orangered;
            border: none;
            outline: none;
            /* transition: 0.2s ease-in-out; */
        }

        .container>div input[type=button]:hover {
            font-size: 19px;
            padding: 0.35rem 0;
            box-shadow: inset 0px 0px 6px rgba(0, 0, 0, 0.6);
        }

        .container .form {
            margin: 2rem auto;
        }

        #download-btn {
            display: none;
        }

        .result-container {
            width: 100%;
        }

        .result-container div {
            margin: auto 0;
        }

        .result-container table {
            width: 100%;
            margin: 1rem auto;
            color: var(--dark);
            /* background-color: white; */
            color: white;
            border: 1px solid white;
            border-radius: 3px;
            padding: 1rem 0.5rem;
        }

        .result-container table th {
            font-size: 1.2rem;
            margin: 0.5rem 0;
        }

        .result-container table tr {
            font-size: 1rem;
            margin: 0.5rem 0;
        }

        .result-container table tr .filetext {
            display: none;
        }

        .result-container table tr button {
            font-size: 0.9rem;
            font-weight: 400;
            padding: 0.5rem;
            margin: 0.5rem 0.3rem;
            outline: none;
            border: none;
            color: white;
            background-color: var(--primary);
        }

        .result-container table tr button:hover {
            box-shadow: inset 0px 0px 3px rgba(0, 0, 0, 0.6);
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- student signup form -->
        <div class="form">
            <h1>Enter Details to Show your Result</h1>
            <label for="name">*Roll No. :</label>
            <input type="text" name="rollno" id="rollno" placeholder="Enter Roll number"></input>

            <label for="name">*D.O.B:</label>
            <input type="date" name="dob" id="dob" placeholder="Enter D.O.B"></input>
            <input type="button" id="result-btn" value="Show Result"></input>
        </div>

        <button id="download-btn">Download Result</button>
    </div>

    <!-- script for creating pdf -->
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

    <!-- jquery script -->
    <script src="js/jquery-3.6.0.js"></script>
    <script>
        // let filetext;

        //results script
        $(document).ready(function () {
            $('#result-btn').click(function () {
                let rform = $('.form');
                let dbtn = $('#download-btn');

                let rollno = $('#rollno').val();
                let dob = $('#dob').val();

                let showPara = $(document.createElement('p'));
                showPara.css({
                    fontSize: "14px",
                    color: "red",
                    margin: "0.6rem",
                });

                if (rollno == "" || dob == "") {
                    showPara.html("Fields should not be Empty");
                    showPara.appendTo('.form');

                    setTimeout(function () {
                        showPara.hide();
                    }, 3000);
                } else {
                    $.ajax({
                        url: 'partials/_results.php',
                        method: 'POST',
                        data: {
                            resultreq: true,
                            rollno: rollno,
                            dob: dob,
                        },
                        success: function (data) {
                            // console.log(data);
                            if (data != "Result not found") {
                                rform.hide();
                                dbtn.show();
                                // filetext = data;
                                let showdiv = $(document.createElement('div'));
                                showdiv.html(data);

                                showdiv.appendTo('.container');
                            } else {
                                showPara.html(data);
                                showPara.appendTo('.form');

                                setTimeout(function () {
                                    showPara.hide();
                                }, 2000);
                            }
                        }
                    });
                }
            });
        });

        //script to download the note from the database
        $(document).ready(function () {
            $('#download-btn').click(function () {
                let filetext = $('.result-container').html();
                let filename = "Result";
                // console.log(filename);
                console.log(filetext);

                let opt = {
                    margin: 6,
                    filename: filename,
                };

                html2pdf().set(opt)
                    .from(filetext)
                    .save();
            });
        });
    </script>
</body>

</html>