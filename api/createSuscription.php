<?php
/* I initialize the PHP SDK
 */
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/keys.php';

$client = new Lyra\Client();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $postBody = file_get_contents("php://input");
    $request = json_decode($postBody, true);

    $store = array(
        "amount"=> $request["amount"],
        "currency"=> "PEN",
        "effectDate"=> $request["effectDate"],
        "initialAmount"=> $request["initialAmount"],
        "initialAmountNumber"=> $request["initialAmountNumber"],
        "paymentMethodToken" => $request["paymentMethodToken"],
        "orderId"=> uniqid("suscription"), //se crea aquí
        "rrule"=> $request["rrule"]
    );

    // $response = $client->post("V4/Charge/CreateSubscription", $store);
    // $suscription = isset($response["answer"]["subscriptionId"]) ? $response["answer"]["subscriptionId"] : null;

    $json = array(
        "status" => "success",
        "suscriptionId" => "123456789abcdef"
    );
    // $json = $store;
    header("Content-Type: application/json");
    http_response_code(200);
    echo json_encode($json);
}
