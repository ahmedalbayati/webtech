<div class="card" style="text-align: center;">
    <h1>Ask our Community. We're here to help!</h1>
    <input type="text">
</div>

<?php foreach ($data as $topic) { ?>
    <a href="<?php echo '/topic/' . $topic['id'] ?>">
        <div class="card">
            topic: <?php echo $topic['name']; ?>
        </div>
    </a>
<?php } ?>
