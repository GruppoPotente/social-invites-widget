<?php

#require_once 'yapd/dbg.php';

require_once 'app.php';

if(!getFormParam('from') || !getFormParam('to') || !getFormParam('message')) {
    redirectWithFormError('send-message-form.php', 'From, to and message are mandatory');
}

// Construct the sms message object:
$socinv = new SocialInviteClient(USERNAME, PASSWORD);

$siReq = new SocialInviteRequest();
$siReq->senderAddress = getFormParam('from');;
$siReq->recipients = getFormParam('to');;
$siReq->messageKey = getFormParam('message');;

try {
    $siResult = $socinv->sendInvite($siReq, SOCIAL_INVITES_APP_SECRET);
    if ($siResult->sendSmsResponse->responses[0]->status != "MessageAccepted") {
      throw new Exception("Message not accepted. Check your destination.");
    }
    $bulkId = $siResult->sendSmsResponse->bulkId;
    redirectWithFormSuccess('send-message-form.php', '<h1>Message sent</h1>');
    return;
} catch(Exception $e) {
    redirectWithFormError('send-message-form.php', 'Error sending message:' . $e->getMessage());
    return;
}
