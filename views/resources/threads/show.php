<?php $messages = ThreadModel::getThread(explode("/", $_SERVER['REQUEST_URI'])[2]); ?>

<div class="card">
    <h1><?php echo $messages['subject']; unset($messages['subject']); ?></h1>
    <br><br>
    <?php if (isset($messages[0]['content'])) { ?> question: <?php echo $messages[0]['content']; } ?>
</div>

<?php if (Auth::is_logged_in()) { ?>
<div class="card">
    <form method="post" action="/message">
        <label for="content">Reply</label><br>

        <textarea id="content" name="content" rows="4" cols="50"></textarea>
        <input name="thread_id" type="hidden" value="<?php echo $messages[0]['thread_id'] ?>"/>
        <input name="user_id" type="hidden" value="<?php echo $_SESSION['user'] ?>"/>

        <br>
        <input type="submit">
    </form>
</div>
<?php } ?>

<br><br>

<?php foreach ($messages as $key => $message) { ?>
    <?php if ($key < 1) continue; ?>
    <div class="card">
        answer: <?php echo $message['content']; ?>
        <br>
        date: <?php echo $message['created_at']; ?>
    </div>
<?php } ?>
