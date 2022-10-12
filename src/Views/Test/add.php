<h1 class="mb-3 text-center">Add Abtest</h1>
<div class="main-george">
    <form id="formData" method="POST" action="switchGeorge.php?action=createDB">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <span class="toSection" target="step-one">Start</span>
                </li>
                <li class="breadcrumb-item">
                    <span class="toSection" target="step-two">Settings</span>
                </li>
                <li class="breadcrumb-item">
                    <span class="toSection" target="step-three">Variations</span>
                </li>
                <li class="breadcrumb-item">
                    <span class="toSection" target="step-for">Filters</span>
                </li>
            </ol>
        </nav>
        <small class="form-text  text-danger">Fill all input with (*)</small>
        <section id="step-one" target="step-two">
            <div class="form-group">
                <label for="nameABtest">Name ABTest</label>
                <input type="text" class="form-control" name="nameABtest" id="nameABtest" placeholder="">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description"></textarea>
            </div>
            <div class="d-flex align-items-center justify-content-center">
                <span class="next btn btn-outline-primary">Suivant</span>
            </div>
        </section>
        <section id="step-two" target="step-three" style="display:none">
            <div class="form-group">
                <label for="name_main_url">Main URL Name</label>
                <input type="text" class="form-control" name="name_main_url" id="name_main_url">
            </div>
            <div class="form-group">
                <label for="urlPrincipal">Main URL <sup>*</sup></label>
                <input type="text" class="form-control" name="url_conversion" id="url_conversion" placeholder="/test/lan/08/">
                <small id="urlPrincipal" class="form-text text-muted">Main url must start and end with "/".</small>
            </div>
            <div class="form-group">
                <label for="DiscoveryRate">Discovery rate <sup>*</sup></label>
                <input type="number" class="form-control" name="taux_decouvert" id="taux_decouvert" placeholder="0.0" value="0.20" min="0.01" step="0.01" max="0.25">
            </div>
            <div class="d-flex align-items-center justify-content-center">
                <span class="next btn btn-outline-primary">Suivant</span>
            </div>
        </section>
        <section id="step-three" target="step-for" style="display:none">

            <h5>Variation n°1</h5>
            <div class="form-group">
                <label for="name_variation_one">Name</label>
                <input type="text" class="form-control" name="name_variation_one" id="name_variation_one">
            </div>
            <div class="form-group">
                <label for="variation_one">Url <sup>*</sup></label>
                <input type="text" class="form-control" name="variation_one" id="variation_one" placeholder="/test/lan/XX/">
                <small class="form-text text-muted">Variation url must start and end with "/".</small>
            </div>

            <div class="more_variation" style="display:none">
                <h5>Variation n°2</h5>
                <div class="form-group">
                    <label for="name_variation_two">Name</label>
                    <input type="text" class="form-control" name="name_variation_two" id="name_variation_two">
                </div>
                <div class="form-group">
                    <label for="variation_two">Url </label>
                    <input type="text" class="form-control" name="variation_two" id="variation_two" placeholder="/test/lan/XX/">
                    <small class="form-text text-muted">Variation url must start and end with "/".</small>
                </div>
            </div>
            <small class="form-text text-muted"><sup>*</sup>if you want to add another variation, do it once the abtest is created</small>

            <div class="mt-2 d-flex align-items-center justify-content-center">
                <span class="addVariation btn btn-outline-secondary">Add Variation</span>
                <span class="next btn btn-outline-primary">Suivant</span>
            </div>
        </section>

        <section id="step-for" style="display:none">
            <div class="form-group">
                <label for="inputState">Devices</label>
                <select class="form-control" name="device_type" id="device_type">
                    <option value="0" selected>Devices...</option>
                    <option value="computer">Computer</option>
                    <option value="mobile">Mobile</option>
                    <option value="tablet">Tablet</option>
                </select>
            </div>
            <div class="form-group">
                <label for="utm_source">Utm_source</label>
                <input type="text" class="form-control" name="utm_source" placeholder="laisser vide si null" id="utm_source">
            </div>

            <div class="form-group">
                <label for="utm_content">Utm_content</label>
                <input type="text" class="form-control" name="utm_content" placeholder="laisser vide si null" id="utm_content">
            </div>

            <div class="form-group">
                <label for="utm_campaign">Utm_campaign</label>
                <input type="text" class="form-control" name="utm_campaign" placeholder="laisser vide si null" id="utm_campaign">
            </div>

            <div class="form-group">
                <label for="utm_term">Utm_term</label>
                <input type="text" class="form-control" name="utm_term" placeholder="laisser vide si null" id="utm_term">
            </div>
            <div class="d-flex align-items-center justify-content-center">
                <button type="submit" class="btn btn-outline-primary">Start AB Test</button>
            </div>
        </section>
    </form>
</div>