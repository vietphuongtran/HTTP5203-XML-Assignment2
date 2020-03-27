<?php
?>
<? foreach ($messages as $m)  { ?>
    <div class="msgcontainer">
        <div class="sender">
            <div><img src="image/blank-profile-picture.png" alt="A blank profile picture"/></div>
            <div class="from"><?=$m['from']?></div>
        </div>
        <div class="message"><?=$m?></div>
    </div>
<? } ?>
<div>
    <form method="POST" action ="">
        <div class="buttoncont">
            <textarea class="textareafield" name="message" placeholder="Enter your message"></textarea>
        </div>
        <div class="buttoncont">
            <button type="submit" name="submit" id="submitbutton" class="button">Submit</button>
        </div>
    </form>
</div>
