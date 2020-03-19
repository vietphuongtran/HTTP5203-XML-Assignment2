
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
    <form>
        <textarea>Please enter your message:</textarea>
        <input type="submit" value="Submit" />
        <!--How can the form send datetime and user information to the xml-->
    </form>
</div>
