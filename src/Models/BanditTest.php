<?php

namespace Georges\Models;


class BanditTest
{
    public $test;
    public array $variations;
    public array $goals;
    public array $visits;

    public function __construct()
    {
        $this->test        = new Test();
        $this->variations   = [];
        $this->goals        = [];
        $this->visits        = [];
    }

    public function setBanditTest(Test $test, array $variations, array $goals, array $visits)
    {
        $this->test        = $test;
        $this->variations   = $variations;
        $this->goals        = $goals;
        $this->visits        = $visits;
    }

    public function getBanditTestById(int $id)
    {
        $testManager = new Test();
        $variationManager = new Variation();
        $goalManager = new Goal();
        $VisitManager = new VisitLog();

        $test = $testManager->get($id);

        $this->test = $test;

        if (!empty($this->test)) {
            $listVariation = $variationManager->getList(500, ['name' => 'test_id', 'agrega' => '=', 'value' => $id]);

            if (!empty($listVariation)) {
                foreach ($listVariation as $oneVariation) {
                    $variation = new Variation();
                    array_push($this->variations, $variation->hydrate($oneVariation));

                    $listGoal = $goalManager->getList(100000, ['name' => 'variation_id', 'agrega' => '=', 'value' => $oneVariation['variation_id']]);
                    if (!empty($listGoal)) {
                        foreach ($listGoal as $oneGoal) {
                            $goal = new Goal();
                            array_push($this->goals, $goal->hydrate($oneGoal));
                        }
                    }

                    $listVisit = $VisitManager->getList(100000, ['name' => 'variation_id', 'agrega' => '=', 'value' => $oneVariation['variation_id']]);
                    if (!empty($listVisit)) {
                        foreach ($listVisit as $oneVisit) {
                            $visit = new VisitLog();
                            array_push($this->visits, $visit->hydrate($oneVisit));
                        }
                    }
                }
            }
        }
        return $this;
    }

    public function searchBanditTest(string $uri = "/", array $filter = null, string $statut = "all")
    {
        $listBanditTest = [];

        $testManager = new Test();
        $variationManager = new Variation();
        $goalManager = new Goal();
        $VisitManager = new VisitLog();

        $tests = $testManager->getList(
            10000,
            [
                ['name' => 'uri_regex', 'agrega' => 'LIKE', 'value' => "%" . $uri . "%"],
                ['name' => 'statut', 'agrega' => '=', 'value' => $statut],
                !empty($filter) ? ['name' => 'filters', 'agrega' => '=', 'value' => $filter] : ""
            ]
        );

        foreach ($tests as $oneTest) {
            $listVariationsTest = [];
            $listGoalsTest = [];
            $listVisitsTest = [];

            $test = new Test();
            $oneTest = $test->hydrate($oneTest);

            $listVariation = $variationManager->getList(500, ['name' => 'test_id', 'agrega' => '=', 'value' => $oneTest->testId]);

            if (!empty($listVariation)) {
                foreach ($listVariation as $oneVariation) {
                    $variation = new Variation();
                    array_push($listVariationsTest, $variation->hydrate($oneVariation));

                    //Get Goal List
                    $listGoal = $goalManager->getList(100000, ['name' => 'variation_id', 'agrega' => '=', 'value' => $variation->variationId]);
                    if (!empty($listGoal)) {
                        foreach ($listGoal as $oneGoal) {
                            $goal = new Goal();
                            array_push($listGoalsTest, $goal->hydrate($oneGoal));
                        }
                    }

                    //Visi List
                    $listVisit = $VisitManager->getList(100000, ['name' => 'variation_id', 'agrega' => '=', 'value' => $variation->variationId]);
                    if (!empty($listVisit)) {
                        foreach ($listVisit as $oneVisit) {
                            $visit = new VisitLog();
                            array_push($listVisitsTest, $visit->hydrate($oneVisit));
                        }
                    }
                }
            }

            $bandit = new BanditTest();
            $bandit->setBanditTest($oneTest, $listVariationsTest, $listGoalsTest, $listVisitsTest);
            array_push($listBanditTest, $bandit);
        }
        // return BanditTest array matching uri_regex,filter and statut
        return $listBanditTest;
    }

    public function save()
    {
        $this->test->save();
        foreach ($this->variations as $variation) {
            $variation->save();
        }

        foreach ($this->goals as $goal) {
            $goal->save();
        }

        foreach ($this->visits as $visit) {
            $visit->save();
        }

        return true;
    }

    public function delete()
    {
        $test_id = $this->test->testId;
        $this->test->delete($test_id);

        if (!empty($this->variations)) {
            foreach ($this->variations as $variation) {
                $variation->delete($variation->variationId);
            }
        }
        if (!empty($this->goals)) {
            foreach ($this->goals as $goal) {
                $goal->delete($goal->goalId);
            }
        }
        if (!empty($this->visits)) {
            foreach ($this->visits as $visit) {
                $visit->delete($visit->visitLogId);
            }
        }

        return true;
    }
}