<div class="container">
    <nav class="mt-2" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="tests">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $banditTest->test->name ?></li>
        </ol>
    </nav>
</div>

<div class="container">
    <div class="headerCard">
        <h1 class="text-center"><?= $banditTest->test->name ?></h1>
        <div class="date_crea text-center">Created At: <?= $banditTest->test->startDate ?></div>
        <div class="d-flex justify-content-between">
            <section class="d-flex align-items-center">
                <div class="card rounded text-center">
                    <span class=" text-info"><?= $banditTest->test->statut == "on" ? "En cours" : "En pause"; ?></span>
                    <span class="discovery_rate">Discovery rate : <b><?= $banditTest->test->discoveryRate * 100 ?>%</b></span>
                </div>
                <div class="card rounded text-center">

                </div>
            </section>
            <div class="dropdown">
                <p class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</p>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item text-info" href="#">Pause/Play</a>
                    <a class="dropdown-item text-danger" href="#">/!\ Supprimer</a>
                    <hr />
                    <a type="button" data-toggle="modal" data-target="#updateFilter" class="dropdown-item text-secondary">Edit Filter</a>
                    <a type="button" data-toggle="modal" data-target="#updateDiscoveryRate" class="dropdown-item text-secondary">Edit Discovery Rate</a>
                </div>
            </div>
        </div>
        <div class="description">
            <p><u>Description</u> :</p>
            <?= $banditTest->test->description ?>
        </div>
    </div>

    <div class="d-flex align-items-center justify-content-center flex-wrap">
        <?php
        foreach ($banditTest->variations as $variation) {
            $countGoal = 0;
            $countVisit = 0;
            $countVisitMobile = 0;
            $countVisitDesktop = 0;
            $countVisitTablet = 0;

            foreach ($banditTest->goals as $goal) {
                if ($goal->variationId == $variation->variationId) {
                    $countGoal++;
                }
            }

            foreach ($banditTest->visits as $visit) {
                if ($visit->variationId == $variation->variationId) {
                    $countVisit++;
                    if ($visit->device == "computer") {
                        $countVisitDesktop++;
                    } else if ($visit->device == "mobile") {
                        $countVisitMobile++;
                    } else if ($visit->device == "tablet") {
                        $countVisitTablet++;
                    }
                }
            }
        ?>
            <div class="card col-12 col-sm-6 <?= $variation->statut == "on" ? '' : 'disabled' ?>">
                <div class="d-flex align-items-center justify-content-center">
                    <h2><?= $variation->name; ?></h2>
                </div>
                <h6 class="text-center text-muted"><?= $variation->uriRegex; ?></h6>
                <div class="row justify-content-center align-items-center">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-12 col-sm-6">
                            <h6 class="mt-5 text-center"><b>Total</b> number <b>visitors</b></h6>
                            <div class="roundedCardText mx-auto">
                                <div><b><?= $countVisit ?></b></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h6 class="mt-5 text-center">Number visitors <b>mobile</b></h6>
                            <div class="roundedCardText mx-auto">
                                <div><b><?= $countVisitMobile ?></b></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h6 class="mt-5 text-center">Number visitors <b>PC</b></h6>
                            <div class="roundedCardText mx-auto">
                                <div><b><?= $countVisitDesktop ?></b></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h6 class="mt-5 text-center">Number visitors <b>Tablet</b></h6>
                            <div class="roundedCardText mx-auto">
                                <div><b><?= $countVisitTablet ?></b></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h6 class="mt-5 text-center">Total conversion</h6>
                            <div class="roundedCardText mx-auto">
                                <div><b><?= $countGoal ?></b></div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <h6 class="mt-5 text-center">Conversion rate</h6>
                            <div class="roundedCardText text-white bg-primary mx-auto">
                                <div>
                                    <b><?= @round(($countGoal / $countVisit) * 100, 1); ?>%</b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>