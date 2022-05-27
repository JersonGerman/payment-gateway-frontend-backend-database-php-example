<?php
/* I initialize the PHP SDK
 */
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/keys.php';

$client = new Lyra\Client();

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $json = array(
        "status" => 200,
        "msg" => "api funcionando...",
        "SERVER" => $_SERVER
    );
    header("Content-Type: application/json");
    http_response_code(200);
    echo json_encode($json);
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $postBody = file_get_contents("php://input");
    $request = json_decode($postBody, true);

    $store = array(
        "currency" => "PEN",
        "orderId" => uniqid("orderId"),
        "customer" => array(
            "email" => $request["email"],
        ),
    );

    $response = $client->post("V4/Charge/CreateToken", $store);
    $formToken1 = isset($response["answer"]["formToken"]) ? $response["answer"]["formToken"] : null;

    $json = array(
        "status" => "success",
        "formToken" => $formToken1
    );
    // $json = $store;
    header("Content-Type: application/json");
    http_response_code(200);
    echo json_encode($json);
}
