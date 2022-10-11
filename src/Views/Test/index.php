<div class="card-container">
    <?php foreach ($testList as $test) { ?>
        <a href="test?test_id=<?= $test['test_id'] ?>">
            <div class=" card">
                <p><?= $test['name'] ?></p>
            </div>
        </a>
    <?php } ?>
</div>