<?php
require('./helpers.php');
if (!isset($_GET["id"])) {
}

$character = getApi("https://api.disneyapi.dev/characters/" . $_GET["id"]);
print '<pre>';
var_dump($_SERVER);
print '</pre>';

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cocktails...</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body class="bg-primary">
    <div class="container text-center">
        <div class="col mb-5">
            <div class="card bg-dark">
                <a href="../disney.php" class="btn btn-secondary position-absolute">back</a>
                <img src="<?= $character->imageUrl ?>" class="card-img-top" alt="<?= $character->name ?>" style="height: 500px; object-fit: contain">
                <div class="card-body">
                    <!-- <h5 class="card-title text-primary">Name</h5>
                    <p class="card-text text-light"><?= $character->name ?></p> -->
                    <?php
                    $data = [
                        "shortFilms" => 'Short Films',
                        "tvShows" => 'Tv Shows',
                        "videoGames" => 'Video Games',
                        "parkAttractions" => 'Park Attractions',
                        "allies" => 'Allies',
                        "enemies" => 'Enemies'
                    ]; ?>

                    <h5 class="card-title text-primary">Name</h5>
                    <p class="card-text text-light"><?= $character->name ?></p>

                    <h5 class="card-title text-primary">Films</h5>
                    <?php foreach ($character->films as $film) { ?>
                        <a href="./disney.php?film=<?= $film ?>" class="card-text text-light" style="display: block"><?= $film ?></a>

                    <?php } ?>


                    <?php foreach ($character as $key => $value) {
                        if (!$value || !array_key_exists($key, $data)) {
                            // exit;

                        } else if (!is_array($value)) { ?>
                            <h5 class="card-title text-primary"><?= $data[$key] ?></h5>
                            <p class="card-text text-light"><?= $value ?></p>

                        <?php } else if (is_array($value)) { ?>
                            <h5 class="card-title text-primary"><?= $data[$key] ?></h5>
                            <?php foreach ($value as $val) { ?>
                                <p class="card-text text-light"><?= $val ?></p>

                    <?php
                            }
                        }
                    } ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>