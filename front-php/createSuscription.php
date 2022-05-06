<?php
require_once "modules/header.php";
require_once "controller/IzipayController.php";
?>

<section class="createSuscription">
    <h1>Crear una suscripción</h1>
    <div class="formSuscription">
        <form action="">
            <div class="formGroup">
                <label for="amount">Monto:</label>
                <input type="number" id="amount">
            </div>
            <div class="formGroup">
                <label for="dateSuscription">Fecha de inicio de suscripción:</label>
                <input type="date" id="dateSuscription">
            </div>
            <div class="formGroup">
                <label for="initialAmount">Monto inicial:</label>
                <input type="number" id="initialAmount">
            </div>
            <div class="formGroup">
                <label for="initialAmountNumber">Número de cuotas del monto inicial: </label>
                <input type="number" id="initialAmountNumber">
            </div>
            <div class="formGroup">
                <label for="paymentMethodToken">Token del método de pago: </label>
                <input type="number" id="paymentMethodToken">
            </div>
            <div class="formGroup">
                <label for="rrule">Regla de recurrencia: </label>
                <input type="number" id="rrule">
            </div>
        </form>
    </div>
</section>