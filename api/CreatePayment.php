<?php
/* I initialize the PHP SDK
 */
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/keys.php';

$client = new Lyra\Client();

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $json = array(
        "status" => 200,
        "msg" => "api funcionando..."
    );
    header("Content-Type: application/json");
    http_response_code(200);
    echo json_encode($json);
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $postBody = file_get_contents("php://input");
    $request = json_decode($postBody, true);

    $store = array(
        "amount" => $request["amount"] * 100,
        "currency" => "USD",
        "orderId" => uniqid("orderId"),
        "customer" => array(
            "email" => $request["email"],
        ),
        "formAction" => isset($request["formAction"]) ? $request["formAction"] : "PAYMENT"
    );

    $response = $client->post("V4/Charge/CreatePayment", $store);
    $formToken = isset($response["answer"]["formToken"]) ? $response["answer"]["formToken"] : null;

    $json = array(
        "status" => "success",
        "formToken" => $formToken
    );
    // $json = $store;
    header("Content-Type: application/json");
    http_response_code(200);
    echo json_encode($json);
}
