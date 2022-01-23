<?php $unapproved_messages = MessageModel::allMessages() ?>

<h2>Approve Messages</h2>

<?php foreach ($unapproved_messages as $message) { ?>
    <div><?php echo $message['content']; ?></div>
<?php } ?>
