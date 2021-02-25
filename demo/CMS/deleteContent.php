<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>selectContentToModify</title>
</head>
    <body>

        <?php
        //in order to display errors
        error_reporting(E_ALL);
        ini_set('display_errors',1);

        require_once("requireOnceFiles/navigation.php");

        require_once("requireOnceFiles/establishConnection.php");    //automatically establishes connection

        //----------------------------------------------------------------------------------------

       $id = htmlspecialchars($_GET ['page']);

        //sql to delete record

        $sql = "DELETE FROM content WHERE id='$id'"; //constructing the sql statemtn using thwe PK "id"

        if(mysqli_query($conn, $sql)) {

            echo "Record deleted Successfully";
        }

        else{

            echo "Error deleting record" . mysqli_error($conn);
        }

        mysqli_close($conn);


        ?>
    </body>
</html>
