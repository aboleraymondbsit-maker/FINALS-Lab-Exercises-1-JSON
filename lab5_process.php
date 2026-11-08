
<?php

header('Content-Type: application/json');


$json = file_get_contents('php://input');


$data = json_decode($json, true);


$name = trim($data["name"] ?? "");


if ($name !== "") {

    $response = array(
        "status" => "success",
        "message" => "Welcome, " . $name . "!"
    );

} else {

    $response = array(
        "status" => "error",
        "message" => "Name is required."
    );

}


echo json_encode($response);
?>
