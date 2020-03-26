<?php
    $mess = "";
    $xml = new DOMDocument("1.0", "UTF-8");
    //load the xml doc
    $xml->preserveWhiteSpace = false;
    $xml->formatOutput = true;
    if (isset($_POST['submit'])) {
        $newMess = $_POST['message'];
        $xml = new DOMDocument("1.0", "UTF8");
        $messageParent = $tickets[0]->messages;
        $messageChild = $xml->createElement("message", $newMess);
        $messageParent->appendChild($messageChild);
        ('tickets.xml');
    }
?>
<? foreach ($messages as $m)  { ?>
    <div class="msgcontainer">
        <div class="sender">
            <div><img src="image/blank-profile-picture.png" alt="A blank profile picture"/></div>
            <div><?=$m['from']?></div>
        </div>
        <div class="message"><?=$m?></div>
    </div>
<? } ?>
<div>
    <form method="POST" action ="">
        <textarea name="message">Please enter your message:</textarea>
        <input type="submit" value="Submit" name ="submit" />
    </form>
</div>
