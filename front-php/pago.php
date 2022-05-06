<?php
require_once "modules/header.php";
require_once "controller/IzipayController.php";
date_default_timezone_set("America/Lima");



if (isset($_POST["kr-hash"])) {
    echo "Gracias por realizar el pago";
    $answer = array();
    $answer['kr-answer'] = json_decode($_POST['kr-answer'], true);
    // print_r($answer);    // Insertar pago
    $objPago = new IzipayController();
    $respuesta = $objPago->insertPay($answer["kr-answer"]["orderDetails"]["orderId"], $answer["kr-answer"]["transactions"][0]["transactionDetails"]["cardDetails"]["pan"], $answer["kr-answer"]["transactions"][0]["transactionDetails"]["cardDetails"]["effectiveBrand"], $answer["kr-answer"]["orderDetails"]["orderTotalAmount"] / 100, $answer["kr-answer"]["transactions"][0]["paymentMethodToken"], $answer["kr-answer"]["transactions"][0]["uuid"], $answer["kr-answer"]["customer"]["email"], $answer["kr-answer"]["transactions"][0]["transactionDetails"]["cardDetails"]["legacyTransId"], date("Y-m-d:H:i:s"));
    // echo $respuesta;
}
