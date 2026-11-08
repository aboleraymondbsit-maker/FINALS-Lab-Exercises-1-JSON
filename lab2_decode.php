<?php

$json = '{"name":"Maria","age":21,"email":"maria@example.com"}';


$object = json_decode($json);


$array = json_decode($json, true);


echo "Object: " . $object->name . "<br>";
echo "Email: " . $object->email . "<br>";


echo "Array: " . $array["name"] . "<br>";
echo "Email: " . $array["email"];
?>
