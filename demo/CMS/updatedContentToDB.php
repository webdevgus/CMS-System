<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>updatedContentToDb.php</title>
</head>
    <body>

        <?php
        //in order to display errors
        error_reporting(E_ALL);
        ini_set('display_errors',1);

        require_once("requireOnceFiles/navigation.php");

        require_once("requireOnceFiles/establishConnection.php");    //automatically establishes connection


        $id = htmlspecialchars($_POST['content_id']);
        $title = htmlspecialchars($_POST['title']);  
        $metaKeywords = htmlspecialchars($_POST['metaKeywords']);  
        $metaDescription = htmlspecialchars($_POST['metaDescription']);  
        $contentData = htmlspecialchars($_POST['contentData']);  


        //----------------------------------------------------------------------------------------

        $sql = "UPDATE content 
        SET title='$title', metaKeywords='$metaKeywords', metaDescription='$metaDescription', contentData='$contentData' 
        WHERE id='$id'";


        if(mysqli_query($conn, $sql)) {
            echo "New record updated successfully!";
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