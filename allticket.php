<?php
    session_start();
    if(!isset($_SESSION['id']) && !isset($_SESSION['pass'] )){
        header('Location: login.php');
    }
    else {
        $xml = new DOMDocument("1.0", "UTF-8");
        //load the xml doc
        $xml = simplexml_load_file("tickets.xml");
        //grabbing all the tickets
        $tickets = $xml->ticket;
        $userids = $tickets->userids;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ticket Listing Page</title>
        <link rel="stylesheet" type="text/css" href="style/login.css">
        <link rel="stylesheet" type="text/css" href="style/header.css">
    </head>
    <body>
        <? include "includes/header.php" ?>
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
                <div id="logout">
                    <a href = 'logout.php'>Log out</a>
                </div>
            </div>
        </div>
        <? include "includes/footer.php" ?>
    </body>
</html>