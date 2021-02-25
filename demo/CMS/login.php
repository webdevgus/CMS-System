<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login.php</title>
</head>
    <body>
        <div id="main">
            <h1>LOGIN</h1>
                <form method = POST>
                    username <input type="text" name="username" class="text autocomplete="off"
                    required>
                    password <input type="password" name="password" class="text" required>
                    <input type="Submit" name="submit" id="sub">
                </form> 
        </div>  

        <?php

        //in order to display errors
        error_reporting(E_ALL);
        ini_set('display_errors',1);

        //Database Connection
        $db_host = 'localhost';
        $db_user = 'root';
        $db_password = 'root';
        $db_db = 'loginDB';
        $db_port = 8889;

        //Connector

        //Connector
        $conn = new mysqli($db_host, $db_user, $db_password, $db_db);

        //----------------------------------------------------------------------------------------

        if(isset($_POST['username'])){
            $uname=$_POST['username'];
            $password=$_POST['password'];

            $sql="select * from loginDB where user='".$uname."' AND Pass='".$password."'
            limit 1";

            $result=mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)==0){

                header ("location:createContent.php");
                exit();
            }
            else{
                echo"You have incorrect password";
                exit();
            }
        }

        mysqli_close($conn);

        ?>
    </body>
</html>