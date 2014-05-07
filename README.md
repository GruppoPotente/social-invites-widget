Social Invites Sending Demo Widget
=======================

Deploy/copy **oneapi-php** and **widget** folder to a folder in your **var/www/path_of_your_project**.

Give read and write permissions to **widget/push_log** folder.

In **widget/config.php** you can customize the following properties:

* **USERNAME** - your Infobip username
* **PASSWORD** - your Infobip password
* **SENDER_INDENTITY** - preferred sending phone number
* **SUCCESS_MESSAGE** -  message for a successful sending of the SMS on the widget form ('Thanks! We sent you a link')
* **ERROR_MESSAGE** - message for a invalid phone number ('Please enter valid number')
* **NUMBER_FORMAT** - format of a number for a client (eg. '(format: 385xxxx)')
* **SOCIAL_INVITES_APP_SECRET** - social invites application secret key ('44f6e472555c4962a36d4076eb53854d')
* **SOCIAL_INVITES_MESSAGE_KEY** - social invites key of message that you wish to send ('6BE887C9C17349C33A3B037AB725FC25')

Owners
======

Framework Integration Team @ Belgrade, Serbia

© 2014, Infobip Ltd.
