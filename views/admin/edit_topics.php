<?php $topics = TopicModel::allTopics() ?>

<h2>Edit Topics</h2>

<div style="margin-left: auto; margin-right: auto;">
    <a class="btn-primary" href="#">save changes</a>

    <?php foreach ($topics as $topic) { ?>
    <div class="edit-topic-card">
        <input type="text" value="<?php echo $topic['name']; ?>" id="<?php echo $topic['id'] ?>">
        <i class="fas fa-times fa-2x" style="float: right; padding: 25px;"></i>
    </div>
    <?php } ?>

    <div class="edit-topic-plus">
        <a href="#">
            <i class="fas fa-plus fa-2x"></i>
        </a>
    </div>
</div>
