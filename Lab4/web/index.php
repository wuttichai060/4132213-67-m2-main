<?php

echo "hello !!!";

$name = "fluk";
$age = 20;

$arr = array("name",20);
$assoc_arr = ["name"=>"wuttichai","age"=>20];

echo $arr[0];
echo $assoc_arr["age"];
echo $arr;
echo "<br>";
var_dump($assoc_arr);
echo "<br>";
echo "hello $name";
echo 'hello $name';

$object = (object)$assoc_arr;
echo $object->name;

function plus($a, $b)
{
    return $a + $b;
}

$add_name = function($name){
    echo "hello $name";
};

$car = (object)["color" => "red", "name" => $add_name];
// echo $car->name("test");
?>


<?php
phpinfo()
?>