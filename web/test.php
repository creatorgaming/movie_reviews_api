<?php
class Car{
    public $color;
    public $type;
}

$myCar = new Car();
$myCar->color = 'red';
$myCar->type = 'sedan';

$yourCar = new Car();
$yourCar->color = 'blue';
$yourCar->type = 'suv';

$cars = array($myCar, $yourCar);

foreach ($cars as $car) {
    echo 'This car is a ' . $car->color . ' ' . $car->type ."<br>";
}
?>