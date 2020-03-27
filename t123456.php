<?php
    session_start();
    $xml = new DOMDocument("1.0", "UTF-8");
    //load the xml doc
    $xml = simplexml_load_file("tickets.xml");
    $tickets = $xml->ticket;
    $messages = $tickets[0]->messages->message;
    $messInsert = $tickets[0]->messages;
    if (isset($_POST['submit'])) {
        $newMess = $_POST['message'];
        $newMsgXML = $messInsert->addChild('message', $newMess);
        $clientid = "/^(c|C)\d{8}$/";
        //if the user is a client (id c....) then add from client otherwise add from staff
        if (preg_match($clientid, $_SESSION['id'])) {
            $newMsgXML->addAttribute('from', 'client');
        }
        else {
            $newMsgXML->addAttribute('from', 'staff');
        }
        $xml->saveXML("tickets.xml");
        //add today date
        $newMsgXML->addAttribute('date', date("d/m/Y"));
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ticket Detail Page</title>
        <link rel="stylesheet" type="text/css" href="style/login.css">
        <link rel="stylesheet" type="text/css" href="style/header.css">
    </head>
    <body>
        <? include "includes/header.php" ?>
        <h2>Ticket Detail</h2>
        <div class="subject">
            <h2><?=$tickets[0]->subject ?></h2>
            <div><?=$tickets[0]->ticketid ?> <?=$tickets[0]->issuedate ?></div>
        </div>
        <?
        include 'ticketdetail.php'
        ?>
        <? include "includes/footer.php" ?>
    </body>
</html>