<?php
include "includes/header.php";
include "../homepage/includes/header_body.php";
@include '../Seller_page/config.php';
?>

<style>
    .dropdown {
        margin-left: auto !important;

    }
</style>
<header class="py-5 border-bottom mb-4 hero " style="margin-top: 100px!important;">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Shop</h1>
            <p class="lead mb-0">A collection of other users posted items</p>
        </div>
    </div>
</header>
<div class="container">
    <div style="padding-top: 10px;">
        <div class="row"><!--form method="GET"-->
            <div class="col">
                <div style="height: 150px;" class="card mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <div class="input-group">
                            <form method='GET'>
                                <div class="input-group">
                                    <input class="form-control" onchange='renderPage()' type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="search" name="search" id='searchBar' />
                                    <button class="btn btn-success" id="button-search" type="submit" name="submit">Go!</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card md-4">
                    <div class="card-header">Filter</div>
                    <form method="GET">
                        <div class="row">
                            <div class="col" style="padding-left:20px;">
                                <div class="form-check">
                                    <input onchange='renderPage()' class="form-check-input" type="checkbox" name="category[]" value="Micro processor/Micro controler" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">Micro Controller</label>
                                </div>
                                <div class="form-check">
                                    <input onchange='renderPage()' class="form-check-input" type="checkbox" name="category[]" value="Motor" id="defaultCheck2">
                                    <label class="form-check-label" for="defaultCheck2">Motors</label>
                                </div>
                                <div class="form-check">
                                    <input onchange='renderPage()' class="form-check-input" type="checkbox" name="category[]" value="Sensor" id="defaultCheck3">
                                    <label class="form-check-label" for="defaultCheck3">Sensors</label>
                                </div>
                            </div>
                            <div class="col">
                                <label for="sort-by">Sort by (Price)</label>
                                <select onchange='renderPage()' class="form-select form-select-sm " aria-label=".form-select-lg example" id="sort-by" name="sort-by" style="width:90%">
                                    <option value="price_asc">Price: Low to High</option>
                                    <option value="price_desc">Price: High to Low</option>
                                </select>
                            </div>
                        </div>
                    </form>
                    <div class="card-footer d-grid"><button type="submit" class="btn btn-success">Filter</button></div>
                </div>
            </div>

        </div>
    </div>
    <div class="row" style="padding-left:10px; padding-right:10px; padding-bottom:10px">
        <?php
        $searchOrFilter = isset($_GET['category']) || isset($_GET['search']) || isset($_GET['sort-by']);
        if (!$searchOrFilter) { ?>
            <div class="card md-4">
                <div class="card-body container">
                    <h2>Latest Products</h2>

                    <?php include "../Seller_page/products.php" ?>
                </div>

            </div>
        <?php } ?>
        <!-- All products section -->
        <div class="card md-4">
            <div class="card-body container">
                <h2>All Products</h2>
                <div id="touchThis">
                    <?php include "includes/allProduct.php" ?></div>
            </div>
        </div>

    </div>
</div>
<?php include "../homepage/includes/footer.php" ?>