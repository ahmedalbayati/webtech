<?php if (isset($_SESSION['user'])) { ?>
    <a href="/thread/create">
        <div class="card" style="direction: rtl;">
            <h2>new question</h2>
        </div>
    </a>
<?php } ?>

<?php foreach ($data as $thread) { ?>
    <a href="<?php echo '/thread/' . $thread['id'] ?>">
        <div class="card">
            subject: <?php echo $thread['subject']; ?>
            <br><br>
            date: <?php echo $thread['creation_date'] ?>
        </div>
    </a>
<?php } ?>
