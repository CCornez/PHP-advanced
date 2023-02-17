<?php
require('./helpers.php');

$categories = getApi("https://www.thecocktaildb.com/api/json/v1/1/list.php?c=list");
usort($categories, function ($a, $b) {
    return strcmp($a->strCategory, $b->strCategory);
});

$drinks = getApi("https://www.thecocktaildb.com/api/json/v1/1/filter.php?c=Cocktail");

if (isset($_GET["cat"])) {
    $drinks = getApi("https://www.thecocktaildb.com/api/json/v1/1/filter.php?c=" . $_GET["cat"]);
}

?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cocktails...</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container text-center">
        <ul class="nav nav-pills mb-5">

            <?php foreach ($categories as $category) { ?>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php?cat=<?= $category->strCategory ?>">
                        <?= $category->strCategory ?>
                    </a>
                </li>
            <?php } ?>

        </ul>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">

            <?php foreach ($drinks as $drink) { ?>
                <div class="col mb-5 h-100">
                    <div class="card">
                        <img src="<?= $drink->strDrinkThumb ?>" class="card-img-top" alt="<?= $drink->strDrink ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $drink->strDrink ?></h5>
                            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                            <a href="./detail.php?id=<?= $drink->idDrink ?>" class="btn btn-primary">More info</a>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</body>

</html>