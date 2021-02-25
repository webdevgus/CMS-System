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

        $sql = "SELECT * FROM `Content`";        //MIGHT NOT WORK PUT 'Content' (with single quotes) instead !!!!!


        if($result = mysqli_query($conn, $sql)) {

            if(mysqli_num_rows($result) > 0) {   //the result

                echo "<table>";
                    echo "<tr>";
                        echo "<th>id | </th>";
                        echo "<th>Title</th>";
                        echo "<th> | metaKeywords | </th>";
                        echo "<th>metaDescription | </th>";
                        echo "<th>contentData | </th>";
                        echo "<th>Delete Content | </th>";
                    echo "</tr>";

                    while($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                            echo "<td>" . "<a href=" . "updateContent.php?page=" . $row['id'] . ">" . $row['id'] . "</a>" . "</td>";
                            echo "<td>" . "<a href=" . "updateContent.php?page=" . $row['id'] . ">" . $row['title'] . "</a>" . "</td>";
                            echo "<td>" . "<a href=" . "updateContent.php?page=" . $row['id'] . ">" . $row['metaKeywords'] . "</a>" . "</td>";
                            echo "<td>" . "<a href=" . "updateContent.php?page=" . $row['id'] . ">" . $row['metaDescription'] . "</a>" . "</td>";
                            echo "<td>" . "<a href=" . "updateContent.php?page=" . $row['id'] . ">" . $row['contentData'] . "</a>" . "</td>";
                            echo "<td>" . "<a href=" . "deleteContent.php?page=" . $row['id'] . ">" . "Delete Content" . "</a>" . "</td>";
                        echo "</tr>";

                    }

                    echo "</table>";

                    mysqli_free_result($result);

            }      

            else {
                echo "No records matching your query.";
            }

        }

        else {
            echo "ERROR: could not execute $sql." . mysqli_error($conn);
        }

        mysqli_close($conn);

        ?>
    </body>
</html>
