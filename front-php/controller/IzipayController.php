<?php

require_once "Conexion.php";

class IzipayController extends Conexion
{
    private $orderId;
    private $pan;
    private $card;
    private $amount;
    private $token;
    private $uuid;
    private $email;
    private $fecha;
    private $idTransaction;
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    public function insertPay($orderId, $pan, $card, $amount, $token, $uuid, $email, $idTransaction, $fecha)
    {

        $this->orderId = $orderId;
        $this->pan = $pan;
        $this->card = $card;
        $this->amount = $amount;
        $this->token = $token;
        $this->uuid = $uuid;
        $this->email = $email;
        $this->idTransaction = $idTransaction;
        $this->fecha = $fecha;

        $sql = "INSERT INTO tb_transaccion(id_transaction, order_Id, email, uuid, amount, fechaCreacion, token, card, pan) VALUES (?,?,?,?,?,?,?,?,?)";
        $insert = $this->conexion->prepare($sql);
        $arrData = array($this->idTransaction, $this->orderId, $this->email, $this->uuid, $this->amount, $this->fecha, $this->token, $this->card, $this->pan);
        $resInsert = $insert->execute($arrData);
        // $idInsert = $this->conexion->lastInsertId();
        // return $idInsert;
        return print_r($arrData);
    }

    public function getAllPays()
    {
        $sql = "SELECT * FROM tb_transaccion";
        $execute = $this->conexion->query($sql);
        $response = $execute->fetchAll(PDO::FETCH_ASSOC);;
        return $response;
    }
}

// $objIziController = new IzipayController();
