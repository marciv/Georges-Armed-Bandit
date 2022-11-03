<div class="container">
    <div class="row">
        <?php foreach ($banditTestList as $banditTest) { ?>
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="cadre-text p-3 row">
                        <div class="col-12 col-md-4 mt-2">
                            <p><u>Create At</u> : <b><?= $banditTest->test->startDate ?></b></p>
                            <p><u>Statut</u> : <?= $banditTest->test->statut == 'on' ? "<b class='text-primary'>En cours</b>" : "<b class='text-warning'>En pause</b>" ?></p>
                            <p><u>Discovery Rate</u> : <b><?= $banditTest->test->discoveryRate * 100 ?>%</b></p>
                            <div class="d-flex justify-content-evenly">
                                <a href="#" class="btn btn-outline-danger">Delete</a>
                            </div>
                        </div>
                        <div class="col-12 col-md-8">
                            <?php foreach ($banditTest->variations as $variation) {
                                $countGoal = 0;
                                $countVisit = 0;

                                foreach ($banditTest->goals as $goal) {
                                    if ($goal->variationId == $variation->variationId) {
                                        $countGoal++;
                                    }
                                }

                                foreach ($banditTest->visits as $visit) {
                                    if ($visit->variationId == $variation->variationId) {
                                        $countVisit++;
                                    }
                                }
                            ?>
                                <p><u>Variation</u> : <?= $variation->name ?></p>
                                <div class="row justify-content-center text-center mx-auto">
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="roundedCardText mx-auto">
                                            <div>V</div>
                                            <div><b>(<?= $countVisit ?>)</b></div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="roundedCardText mx-auto">
                                            <div>C</div>
                                            <div><b>(<?= $countGoal ?>)</b></div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="roundedCardText mx-auto">
                                            <div>TX</div>
                                            <div>(<b><?= @round(($countGoal / $countVisit) * 100, 1); ?>%)</b></div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="bottomBar bg-primary text-center">
                        <a href="test?test_id=<?= $banditTest->test->testId ?>">
                            <h5><?= $banditTest->test->name ?></h5>
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>