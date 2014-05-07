<?php
    require_once 'app.php';
?>
<html>
    <head>
        <title>Social Invites Demo Widget</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="holder">
            <h1>Social Invites Demo Widget</h1>
            <?php showFormMessage() ?>
            <form method="POST" action="send-message-action.php">
                <fieldset>
                    <input type="hidden" name="from" value="<?php echo SENDER_INDENTITY ?>" size="15"/>
                    <label for="phone-number">Phone Number <?php echo NUMBER_FORMAT ?>:</label>
                    <input type="text" name="to" value="<?php echo getFormParam('to') ?>" size="18"/>
                    <input type="hidden" name="message" value="<?php echo SOCIAL_INVITES_MESSAGE_KEY ?>" size="15"/>
                </fieldset>
                <input type="submit" value="Send message" />
                <p class="site-link">Powered by <a href="https://infobip.com/">Infobip</a></p>
            </form>
        </div>
    </body>
</html>
