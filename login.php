<?php
session_start();
$xml = new DOMDocument("1.0", "UTF-8");
//load the xml doc
$xml = simplexml_load_file("users.xml");
$users = $xml->user;
$password = $users->password;
$id = $users->id;

if (!empty($_POST)) {
    if (isset($_POST['userId']) && isset($_POST['userPassword'])) {
        if (($_POST['userId'] == $id) && ($_POST['userPassword'] == $password)) {
            $_SESSION['userid'] = $id;
            $_SESSION['password'] = $password;
            header("Location: listingpage.php");
        }
        else {
            echo "Invalid log in details";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Ticket login</title>
        <link rel="stylesheet" type="text/css" href="style/login.css">
    </head>

    <body>
        <div class = "container">
            <form class="formcontainer" method="Post" action="">
                <h2>Technical Support System</h2>
                <div class="inputfield">
                    <input class="inputtext" type="text" name="userId" placeholder="Please enter user Id">
                </div>
                <div class="inputfield">
                    <input class="inputtext" type="password" name="userPassword" placeholder="Password">
                </div>
                <div id="buttoncontainer" class="buttoncont">
                    <button type="submit" name="submit" id="loginbutton" class="button">Login</button>
                </div>
            </form>
        </div>
    </body>
</html>