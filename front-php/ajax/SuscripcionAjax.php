<?php

require_once "../controller/IzipayController.php";

class SuscriptionAjax
{

    public $idTransaccion;
    public $idSuscription;

    public function registrar()
    {

        $izi =  new IzipayController();
        $rpta = $izi->insertSuscription($this->idTransaccion, $this->idSuscription);
        return $rpta;
    }
}

if (isset($_POST["suscriptionId"])) {
    echo json_encode(array("success" => 1,"suscriptionId" => $_POST["suscriptionId"], "transaccionId" => $_POST["transaccionId"]));
} else {
    echo json_encode(array("success" => 0));
}
