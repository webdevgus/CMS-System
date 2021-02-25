<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>creatContent</title>
</head>
    <body>
        <?php
        //in order to display errors
        error_reporting(E_ALL);
        ini_set('display_errors',1); 

        require_once("requireOnceFiles/navigation.php");
        require_once("requireOnceFiles/establishConnection.php");    //automatically establishes connection

        ?>

        <!-- Opening Form tag -->
        <form name="myForm" method="post" action="insertContentToDB.php"> <br>

        <!-- // I was already familiar with a drop down since I have used it before on a clients website so I impleneted it -->
        <!-- // Notice how within the input "id" was substituted for "list". This creates the same principal, but it allows us
                to have that drop down menu instead of typing something in. -->
            <p>Title: <input type="text" name="title" list="title" ></p>
                <!-- I went this Mr, Mrs, Ms, etc since those are the most common.-->
                <datalist id="title">
                    <option value="1st DB intergration test">
                    <option value="Mr.">
                    <option value="Mrs.">
                    <option value="Miss.">
                    <option value="Ms.">
                </datalist>
        <br>

        <p>Enter Keywords:<input type="text" name="metaKeywords" id="metaKeywords"></p>
        <br>
        <p>Enter a Description:<input type="text" name="metaDescription" id="metaDescription"> </p>
        <br>
        <p>Enter your Content:<input type="text" name="contentData" id="contentData"></p>
        <br>
        <input type="submit">
        </form>
    </body>
</html>