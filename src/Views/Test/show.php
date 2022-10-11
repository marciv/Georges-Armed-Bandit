<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="text-bold text-center">{{name}}</h1>
            <h6 class="text-bold text-center">Created At: {{startDate}}</h6>
            <div class="card-container">
                <div class="card text-center">
                    <p><?= $test->statut == "on" ? "En cours" : "En pause"; ?></p>
                    <p>Discovery Rate : {{discoveryRate}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card-container">
        <?php
        foreach ($variations as $variation) {
            var_dump($variation);
        }
        ?>
    </div>
</div>