<?php
$xml = new DOMDocument("1.0", "UTF-8");
//load the xml doc
$xml = simplexml_load_file("tickets.xml");
$tickets = $xml->ticket;
$messages = $tickets[2]->messages->message;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ticket Detail Page</title>
        <link rel="stylesheet" type="text/css" href="style/login.css">
    </head>
    <body>
        <h2>Ticket Detail</h2>
        <div><?=$tickets[2]->subject ?></div>
        <div><?=$tickets[2]->ticketid ?> <?=$tickets[2]->issuedate ?></div>
        <?
        include 'ticketdetail.php'
        ?>
    </body>
</html>
