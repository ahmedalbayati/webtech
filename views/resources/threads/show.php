<div class="card">
    <h1><?php echo $data['subject']; unset($data['subject']); ?></h1>
    <br><br>
    <?php if (isset($data[0]['content'])) { ?> question: <?php echo $data[0]['content']; } ?>
</div>

<?php if (isset($_SESSION['user'])) { ?>
<div class="card">
    <form method="post" action="/message">
        <label for="content">Reply</label><br>

        <textarea id="content" name="content" rows="4" cols="50"></textarea>
        <input name="thread_id" type="hidden" value="<?php echo $data[0]['thread_id3'] ?>"/>
        <input name="user_id" type="hidden" value="<?php echo $_SESSION['user'] ?>"/>

        <br>
        <input type="submit">
    </form>
</div>
<?php } ?>

<br><br>

<?php foreach ($data as $key => $message) { ?>
    <?php if ($key < 1) continue; ?>
    <div class="card">
        answer: <?php echo $message['content']; ?>
        <br>
        date: <?php echo $message['created_at']; ?>
    </div>
<?php } ?>
