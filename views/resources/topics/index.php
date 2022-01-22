<?php $topics = TopicModel::allTopics(); ?>

<h1>Need Help?</h1>

<div style="margin-left: 30%;margin-right:30%;">
    <div style="text-align: center;">
        <h2>First try looking up your question.</h2>
        <input type="text">
    </div>

    <h2>Otherwise, create a new question.</h2>
    <?php foreach ($topics as $topic) { ?>
        <a href="<?php echo '/topic/' . $topic['id'] ?>">
            <div class="topic-card">
                <?php echo $topic['name']; ?>
            </div>
        </a>
    <?php } ?>
</div>
