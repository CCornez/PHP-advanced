<?php

spl_autoload_register(function ($class_name) {
    include $_SERVER["DOCUMENT_ROOT"] . $_SERVER["REQUEST_URI"] . 'Class/' . $class_name . '.class.php';
});

$vogelbekdier = new Bird("Jos", "Baa");

print "<pre>";
print $vogelbekdier->getName();
print "<br />";
print $vogelbekdier->makeNoise();
print "<br />";
print $vogelbekdier->fly();
print "</pre>";


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Person</title>
</head>

<body>
    <h1>Hello</h1>
</body>

</html>