<?php
$xml = new DOMDocument("1.0", "UTF-8");
//load the xml doc
$xml = simplexml_load_file("tickets.xml");
$tickets = $xml->ticket;
$messages = $tickets[1]->messages->message;
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
        <div><?=$tickets[1]->subject ?></div>
        <div><?=$tickets[1]->ticketid ?> <?=$tickets[1]->issuedate ?></div>
        <?
        include 'ticketdetail.php'
        ?>
        <? include "includes/footer.php" ?>
    </body>
</html>