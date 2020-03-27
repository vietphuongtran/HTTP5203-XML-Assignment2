<?php
$xml = new DOMDocument("1.0", "UTF-8");
//load the xml doc
$xml = simplexml_load_file("tickets.xml");
$tickets = $xml->ticket;
//This depends on postion -> improvement: come up with a more efficient way
$messages = $tickets[2]->messages->message;
$messInsert = $tickets[2]->messages;
if (isset($_POST['submit'])) {
    $newMess = $_POST['message'];
    $newMsgXML = $messInsert->addChild('message', $newMess);
    $clientid = "/^(c|C)\d{8}$/";
    //if the user is a client (id c....) then echo from client otherwise echo from staff
    if (preg_match($clientid, $_SESSION['id'])) {
        $newMsgXML->addAttribute('from', 'client');
    }
    else {
        $newMsgXML->addAttribute('from', 'staff');
    }
    //add today date
    $newMsgXML->addAttribute('date', date("d/m/Y"));
    $xml->saveXML("tickets.xml");
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
            <h2><?=$tickets[2]->subject ?></h2>
            <div><?=$tickets[2]->ticketid ?> <?=$tickets[2]->issuedate ?></div>
        </div>
        <?
        include 'ticketdetail.php'
        ?>
        <? include "includes/footer.php" ?>
    </body>
</html>
