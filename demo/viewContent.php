<?php
        //in order to display errors
        error_reporting(E_ALL);
        ini_set('display_errors',1);

        require_once("requireOnceFiles/navigation.php");

        require_once("requireOnceFiles/establishConnection.php");    //automatically establishes connection

        //----------------------------------------------------------------------------------------

        //Setup variable for Query String

        $page = htmlspecialchars($_GET['page']);   //Get the page variable from the browser URL String

        //echo "DEBUG = $page";   //Debug to shoiw local variable

        $sql = "SELECT * FROM `Content` WHERE id='$page'";  //note of nesting of " '

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0) {

            //if we did find records, then display that info

            while($row = mysqli_fetch_assoc($result)) {

                //echo "DEBUG - id" . $row["id"] . " -Title = " . $row["title"] . "<br />";

                //Creat Local Variables
                $title = $row["title"];
                $metaKeywords = $row["metaKeywords"];
                $metaDescription = $row["metaDescription"];
                $contentData = $row["contentData"];

            }

        }

        else{
            echo "0 Results";
        }

        mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $title;?></title>
        <meta name="descritption" content="<?php echo $metaDescription;?>">
    </head>

    <body>
    <?php echo $contentData;?>
    <br>
    <?php echo $metaDescription;?>
    <br>
    <?php echo $metaKeywords;?>
    </body>
</html>