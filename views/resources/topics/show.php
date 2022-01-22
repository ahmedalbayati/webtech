<?php $threads = TopicModel::getTopic(explode("/", $_SERVER['REQUEST_URI'])[2]); ?>

<?php if (isset($_SESSION['user'])) { ?>
    <a href="/thread/create">
        <div class="card" style="direction: rtl;">
            <h2>new question</h2>
        </div>
    </a>
<?php } ?>

<?php foreach ($threads as $thread) { ?>
    <a href="<?php echo '/thread/' . $thread['id'] ?>">
        <div class="card">
            subject: <?php echo $thread['subject']; ?>
        </div>
    </a>
<?php } ?>
