<?php

namespace Georges\Models;


class BanditTest {

    public $test;
    public $variation;
    public $goal;
    

    public function __construct(){
        $this->test        = new Test();
        $this->variation   = new Variation();
        $this->goal        = new Goal();
    }

    public function setBanditTest(Test $test,Variation $variation,Goal $goal){
        $this->test        = $test;
        $this->variation   = $variation;
        $this->goal        = $goal;        
    }    

    public function getBanditTestById($id){
        // return BanditTest;
    }

    public function searchBanditTest($uri = "/",$filter = [],$statut = "all"){
        // return BanditTest array matching uri_regex,filter and statut
    }
    
    public function save(){
        // create or update BanditTest;
    }







}