<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    <title>Generate QR code</title>
    
 <style>
        body,html 
        {
            height: 100%;
            width: 100%;
        }
        body{
            background-image: url(background.jpg);
            background-size: cover;
            background-repeat: no-repeat;
        }
</style>
</head>
    
<body class="bg">
    <div class="container" id="panel">
        <br><br><br>
            <div class="row">
                <div class="col-md-6 offset-md-3" style="background-color: white; padding: 20px; box-shadow: 10px 10px 5px #888;">
                    <div class="panel-heading">
                        <h1>Generate the QR code</h1>
                    </div>
                    <hr>
                    <div id="qrbox" style="text-align: center;">
                        <img src="generate.php?text=<?php echo $_GET['text']?>" alt="">
                    </div>
                    <hr>
                    <a href="index.php">Generate More..</a>
                </div>
            </div>
    </div>
</body>
</html>