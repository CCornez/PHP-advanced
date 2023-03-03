<?php

require_once './Planets.class.php';

$mercury = new Planet('Mercury', 4880, 57910000);
$venus = new Planet('Venus', 12104, 108208930);
$earth = new Planet('Earth', 12756, 149597870);
$mars = new Planet('Mars', 6794, 227936640);
$jupiter = new Planet('Jupiter', 142984, 778412010);
$saturn = new Planet('Saturn', 120536, 1426725400);
$uranus = new Planet('Uranus', 51118, 287097220);
$neptune = new Planet('Neptune', 49572, 4498252900);

echo $earth->getCircumference();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Hello</h1>
</body>

</html>