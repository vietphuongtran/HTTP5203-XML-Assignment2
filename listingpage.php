<?php
    $xml = new DOMDocument("1.0", "UTF-8");
    //load the xml doc
    $xml = simplexml_load_file("tickets.xml");
    //grabbing all the tickets
    $tickets = $xml->ticket;
    $userids = $tickets->userids;
//    session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ticket Listing Page</title>
        <link rel="stylesheet" type="text/css" href="style/login.css">
    </head>
    <body>
        <div class="container">
            <div class="formcontainer">
                <h2>Ticket List</h2>
                <? foreach ($tickets as $ticket) { ?>
                <div class="ticketpreview">
                    <div><a href="<?=$ticket->ticketid?>.php"><?= $ticket->subject ?></a></div>
                    <div><?=$ticket->ticketid ?> <?=$ticket->issuedate ?></div>
                    <div><?=$ticket->status ?></div>
                </div>
                <? } ?>
            </div>
        </div>

    </body>
</html>