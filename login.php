<?php
    session_start();
    if(isset($_POST['submit'])) {
        $invalid ="";
        //retrieving the user id and password input from a form
        $userid = $_POST['userId'];
        $userpass = $_POST['userPassword'];
        $userpasshash = password_hash($_POST['userPassword'], PASSWORD_DEFAULT);
        $xml = new DOMDocument("1.0", "UTF-8");
        //load the xml doc
        $xml = simplexml_load_file("users.xml");
        //hash the password from the xml
        //problem: it is hard to hash all the password here as the passwordhash only takes in a string and xpath give an array
//        solution1: store the hash value of password in the XML - not working
//        $passhash = password_hash($xml->xpath("//users/user[0]/password"), PASSWORD_DEFAULT);
        //finding the node which has both the id and password match with the user input.
        $login = $xml->xpath("//users/user[./id = '{$userid}'][./password = '{$userpass}']");
        //if it match, then create the session
        if(count($login))
        {
            $_SESSION['id'] = $userid;
            $_SESSION['password'] = $userpass;
            $clientid = "/^(c|C|s|S)\d{8}$/";
            //if the user is a client (id c....) or a supporting technician (id s...) go to the page which ONLY contains that client's or supporting technician's ticket
            if (preg_match($clientid, $_SESSION['id'])) {
                header('Location: clientticket.php');
            }
            //if the user is an admin (a...) go to the total listing page which have all the tickets.
            //that will allow admin to oversee everything and jump in to help the supporting technician in some cases
            else {
                header('Location: allticket.php');
            }
        }
        else
        {
            $invalid = "Invalid login credential";
        }
//        This grab the pass and id from XML as an array
//        But any combination of id and pass would work
//        $pass = $xml->xpath("//password");
//        $id = $xml->xpath('//id');
//        loop through with specific index also not helpful;
//        for ($x=0; $x <= count($id); $x++) {
//            if ($userpass == $pass[$x] && $userid = $id[$x]) {
//                    $_SESSION['id'] = $id[$x];
//                    $_SESSION['pass'] = $pass[$x];
//                    header('Location: allticket.php');
//                }
//            else {
//                echo 'Invalid login credential';
//            }
//        }
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Ticket login</title>
        <link rel="stylesheet" type="text/css" href="style/login.css">
        <link rel="stylesheet" type="text/css" href="style/header.css">
    </head>

    <body>
        <? include "includes/header.php" ?>
        <div class = "container">
            <form class="formcontainer" method="Post" action="">
                <h2>Technical Support System</h2>
                <div class="inputfield">
                    <input class="inputtext" type="text" name="userId" placeholder="Please enter user Id">
                </div>
                <div class="inputfield">
                    <input class="inputtext" type="password" name="userPassword" placeholder="Password">
                </div>
                <div>
                    <?=$invalid?>
                </div>
                <div class="buttoncont">
                    <button type="submit" name="submit" id="loginbutton" class="button">Login</button>
                </div>
            </form>
        </div>
        <? include "includes/footer.php" ?>
    </body>
</html>