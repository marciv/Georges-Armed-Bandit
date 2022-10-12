<div class="container">
    <div class="row">
        <?php foreach ($testList as $test) { ?>
            <a href="test?test_id=<?= $test['test_id'] ?>">
                <div class="col-6 card text-center">
                    <p><b><?= $test['name'] ?></b></p>
                </div>
            </a>
        <?php } ?>
    </div>
</div>