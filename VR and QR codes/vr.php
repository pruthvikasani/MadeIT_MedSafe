<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="aframe.min.js"></script>
<!--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
-->

    <title>VR</title>
</head>
    
<body>

                    <?php 
                    $server="localhost";
                    $dbname="data";
                    $username="root";
                    $password="";
                        
                    $conn = new mysqli($server,$username,$password,$dbname);
                    
                    if($conn->connect_error)
                    {
                        die("Connection failed: ".$conn->connect_error);
                    }
                    $sql="SELECT * FROM medinfo WHERE med_name='".$_GET['text']."'";
                    //echo $sql;
                    $result= $conn->query($sql);
                    
                        
                            while($row = mysqli_fetch_assoc($result))
                            {
                                //echo $row["med_name"].$row["med_usage"];
                                echo "<a-scene>
                                <a-box  position='2 1 -8' scale='3.2 3.2 3.2' color='white' rotation='0 0 0'>
                                <a-text value='".$row["med_name"]."' color='#BBB'
                                    position='-0.4 0 0.5' scale='1 1 1'></a-text>
                                </a-box>
                                <a-box  position='-2 1 -8' scale='3.2 3.2 3.2' color='while' rotation='0 0 0'>

                                    <a-text value='".$row["med_usage"]."' color='#BBB'
                                    position='-0.4 0 0.5' scale='0.5 0.5 0.5'></a-text>
                                </a-box>

                                    <a-sky color='lightblue'></a-sky>
                                </a-scene>";
                            }
                        
                        
                      
                    ?>
                   
                
            
    
</body>
</html>