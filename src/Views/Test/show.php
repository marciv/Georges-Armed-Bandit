<div class="container">
    <nav style="--bs-breadcrumb-divider: >" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="tests">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{name}}</li>
        </ol>
    </nav>
</div>

<div class="container">
    <div class="headerCard">
        <h1 class="text-center">{{name}}</h1>
        <div class="date_crea text-center">Created At: {{startDate}}</div>
        <div class="d-flex justify-content-between">
            <section class="d-flex align-items-center">
                <div class="card rounded text-center">
                    <span class=" text-info"><?= $test->statut == "on" ? "En cours" : "En pause"; ?></span>
                    <span class="discovery_rate">Discovery rate : <b>{{discoveryRate}}</b></span>
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
            {{description}}
        </div>
    </div>

    <div class="d-flex align-items-center justify-content-center flex-wrap">

        <?php
        foreach ($variations as $variation) {
        ?>
            <div class="card col-12 col-sm-6 <?= $variation['statut'] == "on" ? '' : 'disabled' ?>">
                <div class="d-flex align-items-center justify-content-center">
                    <h2><?= $variation['name']; ?></h2>
                </div>
                <h6 class="text-center text-muted"><?= $variation['uri_regex']; ?></h6>
                <div class="row justify-content-center align-items-center">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-12 col-sm-6">
                            <h6 class="mt-5 text-center">Nombre de visiteur</h6>
                            <div class="roundedCardText mx-auto">
                                <div><b><?= $variation['visitCount']; ?></b></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h6 class="mt-5 text-center">Conversion total</h6>
                            <div class="roundedCardText mx-auto">
                                <div><b><?= $variation['goalCount']; ?></b></div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <h6 class="mt-5 text-center">Taux de conversion</h6>

                            <div class="roundedCardText text-white bg-primary mx-auto">
                                <div>
                                    <b><?php echo @round(($variation['goalCount'] / $variation['visitCount']) * 100, 1); ?>%</b>
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