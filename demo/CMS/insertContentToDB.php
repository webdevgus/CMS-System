<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insertContentToDB</title>
</head>
    <body>

        <?php
        //in order to display errors that occur
        error_reporting(E_ALL);
        ini_set('display_errors',1);

        require_once("requireOnceFiles/navigation.php");

        require_once("requireOnceFiles/establishConnection.php");    //automatically establishes connection

        //-----------------------------------------------------------------------------------------------------------------------//

        $title = htmlspecialchars($_POST['title']);   //Grabbing the value that the user selected from the lsit
        $metaKeywords = htmlspecialchars($_POST['metaKeywords']);   //Grabbing the value that the user selected from the lsit
        $metaDescription = htmlspecialchars($_POST['metaDescription']);   //Grabbing the value that the user selected from the lsit
        $contentData = htmlspecialchars($_POST['contentData']);   //Grabbing the value that the user selected from the lsit

        //Debugging if needed: 
            //echo "Title successfully captured! You selected: " . $title . "<br />";    // will render ot data to screen
            //echo "metaKeywords successfully captured! You entered: " . $metaKeywords . "<br />";     // will render ot data to screen
            //echo "metaDescription successfully captured! You typed: " . $metaDescription . "<br />";       // will render ot data to screen
            //echo "contentData successfully captured! You entered: " . $contentData .  "<br />";      // will render ot data to screen


        //SQL Command
        $sql = "INSERT INTO content(title, metaKeywords, metaDescription, contentData)
                VALUES ('$title','$metaKeywords','$metaDescription','$contentData')";

        if(mysqli_query($conn, $sql)) {
            echo "New record created successfully!";
        }
            //Error handler
            else {
                echo "Error: " . $sql . "" . mysqli_error($conn);
            }
            //Closing the DB connection
            $conn->close();
            

        ?>

    </body>
</html>
