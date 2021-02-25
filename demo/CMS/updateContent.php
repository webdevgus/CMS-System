<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>updateContent</title>
</head>
    <body>

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
        <!-- Opening Form tag -->
        <form name="myForm" method="POST" action="updatedContentToDB.php"> <br>

        <input type="hidden" name="content_id" id="content_id" value="<?php echo $page;?>">

        <!-- // I was already familiar with a drop down since I have used it before on a clients website so I impleneted it -->
        <!-- // Notice how within the input "id" was substituted for "list". This creates the same principal, but it allows us
                to have that drop down menu instead of typing something in. -->
            <p>Title: <input type="text" name="title" list="title" value="<?php echo $title;?>" ></p>
                <!-- I went this Mr, Mrs, Ms, etc since those are the most common.-->
                <datalist id="title">
                    <option value="1st DB intergration test">
                    <option value="Mr.">
                    <option value="Mrs.">
                    <option value="Miss.">
                    <option value="Ms.">
                </datalist>
        <br>

        <p>Enter Keywords:<input type="text" name="metaKeywords" id="metaKeywords" value="<?php echo $metaKeywords;?>"></p>
        <br>
        <p>Enter a Description:<input type="text" name="metaDescription" id="metaDescription" value="<?php echo $metaDescription;?>"> </p>
        <br>
        <p>Enter your Content:<input type="text" name="contentData" id="contentData" value="<?php echo $contentData;?>"</p>
        <br>
        <input type="submit">
        </form>

    </body>
</html>