<?php
require('./helpers.php');

$api = "https://api.disneyapi.dev/characters";
if (isset($_GET['film'])) {
    $api = "https://api.disneyapi.dev/character?films=" . $_GET['film'];
}
$characters = getApi($api)->data;


// print "<pre>";
// var_dump($characters);
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
        <!-- <ul class="nav nav-pills mb-5">

            <?php foreach ($categories as $category) { ?>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php?cat=<?= $category->strCategory ?>">
                        <?= $category->strCategory ?>
                    </a>
                </li>
            <?php } ?>

        </ul> -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 mt-5">

            <?php foreach ($characters as $character) { ?>
                <div class="col mb-5" style="height: 300px; width: 300px">
                    <div class=" card h-100">
                        <img src="<?= $character->imageUrl ?>" class="card-img-top" alt="<?= $character->name ?>" style="object-fit: contain; height: 200px">
                        <div class="card-body">
                            <h5 class="card-title"><?= $character->name ?></h5>
                            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                            <a href="./detail/<?= $character->_id ?>" class="btn btn-primary">More info</a>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</body>

</html>