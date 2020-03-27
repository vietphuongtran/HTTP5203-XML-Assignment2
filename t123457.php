<?php
$xml = new DOMDocument("1.0", "UTF-8");
//load the xml doc
$xml = simplexml_load_file("tickets.xml");
$tickets = $xml->ticket;
$messages = $tickets[1]->messages->message;
$messInsert = $tickets[1]->messages;
if (isset($_POST['submit'])) {
    $newMess = $_POST['message'];
    $newMsgXML = $messInsert->addChild('message', $newMess);
    $clientid = "/^(c|C|s|S)\d{8}$/";
    //if the user is a client (id c....) or a supporting technician (id s...) go to the page which ONLY contains that client's or supporting technician's ticket
    if (preg_match($clientid, $_SESSION['id'])) {
        $newMsgXML->addAttribute('from', 'client');
    }
    else {
        $newMsgXML->addAttribute('from', 'staff');
    }
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
            <h2><?=$tickets[1]->subject ?></h2>
            <div><?=$tickets[1]->ticketid ?> <?=$tickets[1]->issuedate ?></div>
        </div>
        <?
        include 'ticketdetail.php'
        ?>
        <? include "includes/footer.php" ?>
    </body>
</html>