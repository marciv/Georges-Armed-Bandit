<?php

namespace Georges\Models;


class BanditTest
{

    public $test;
    public array $variations;
    public array $goals;


    public function __construct()
    {
        $this->test        = new Test();
        $this->variations   = [];
        $this->goals        = [];
    }

    public function setBanditTest(Test $test, array $variations, array $goals)
    {
        $this->test        = $test;
        $this->variations   = $variations;
        $this->goals        = $goals;
    }

    public function getBanditTestById(int $id)
    {
        $testManager = new Test();
        $variationManager = new Variation();
        $goalManager = new Goal();

        $test = $testManager->get($id);

        $this->test = $test;

        if (!empty($this->test)) {
            $listVariation = $variationManager->getList(500, ['name' => 'test_id', 'agrega' => '=', 'value' => $id]);


            foreach ($listVariation as $oneVariation) {
                $variation = new Variation();
                array_push($this->variations, $variation->hydrate($oneVariation));
                $listGoal = $goalManager->getList(100000, ['name' => 'variation_id', 'agrega' => '=', 'value' => $oneVariation['variation_id']]);
                foreach ($listGoal as $oneGoal) {
                    $goal = new Goal();
                    array_push($this->goals, $goal->hydrate($oneGoal));
                }
            }
        }
        return $this;
    }

    public function searchBanditTest(string $uri = "/", array $filter = null, string $statut = "all")
    {
        $listVariationsTest = [];
        $listGoalsTest = [];
        $listBanditTest = [];

        $testManager = new Test();
        $variationManager = new Variation();
        $goalManager = new Goal();

        $tests = $testManager->getList(
            10000,
            [
                ['name' => 'uri_regex', 'agrega' => 'LIKE', 'value' => "%" . $uri . "%"],
                ['name' => 'statut', 'agrega' => '=', 'value' => $statut],
                !empty($filter) ? ['name' => 'filters', 'agrega' => '=', 'value' => $filter] : ""
            ]
        );

        foreach ($tests as $oneTest) {
            $listVariation = $variationManager->getList(500, ['name' => 'test_id', 'agrega' => '=', 'value' => $oneTest['test_id']]);

            $test = new Test();
            $oneTest = $test->hydrate($oneTest);

            foreach ($listVariation as $oneVariation) {
                $variation = new Variation();
                array_push($listVariationsTest, $variation->hydrate($oneVariation));

                //Get Goal List
                $listGoal = $goalManager->getList(100000, ['name' => 'variation_id', 'agrega' => '=', 'value' => $oneVariation['variation_id']]);
                foreach ($listGoal as $oneGoal) {
                    $goal = new Goal();
                    array_push($listGoalsTest, $goal->hydrate($oneGoal));
                }
            }

            $bandit = new BanditTest();
            $bandit->setBanditTest($oneTest, $listVariationsTest, $listGoalsTest);
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

        return true;
    }

    public function delete()
    {
        $test_id = $this->test->testId;
        $this->test->delete(6);

        foreach ($this->variations as $variation) {
            $variation->delete($variation->variationId);
        }

        foreach ($this->goals as $goal) {
            $goal->delete($goal->goalId);
        }

        return true;
    }
}
