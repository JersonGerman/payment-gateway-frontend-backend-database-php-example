<?php
require_once "modules/header.php";
require_once "controller/IzipayController.php";
?>

<section class="row container mx-auto createSuscription">
    <h2 class="mb-4">Crear Suscripción</h2>
    <div class="col-6 w-50 formSuscription">
        <form id="createSuscription" class="row g-3">
            <div class="col-4 mb-2 formGroup">
                <label for="amount">Monto:</label>
                <input class="form-control" type="number" id="amount" required>
                <input type="hidden" id="transaccionId" value="<?=$_GET["id"]?>">
            </div>
            <div class="col-4 mb-2 formGroup">
                <label for="dateSuscription">Fecha Inicio Suscripción</label>
                <input class="form-control" type="date" id="dateSuscription" required>
            </div>
            <div class="col-4 mb-2 formGroup">
                <label for="timeSuscription">Hora Inicio Suscripción</label>
                <input class="form-control" type="time" id="timeSuscription" required>
            </div>
            <div class="col-6 mb-2 formGroup">
                <label for="initialAmount">Monto Inicial:</label>
                <input class="form-control" type="number" id="initialAmount" required>
            </div>
            <div class="col-6 mb-2 formGroup">
                <label for="initialAmountNumber">Número de cuotas del monto inicial: </label>
                <input class="form-control" type="number" id="initialAmountNumber" required>
            </div>
            <div class="col-12 mb-2 formGroup">
                <label for="paymentMethodToken">Token del método de pago: </label>
                <input class="form-control" type="text" id="paymentMethodToken" value="<?= isset($_GET["token"]) ? $_GET["token"] : "" ?>" readonly>
            </div>
            <div class="col-12 mb-2 formGroup">
                <label for="rrule">Regla de recurrencia: </label>
                <input class="form-control" type="text" id="rrule" required>
            </div>
            <div class="col-12 formGroup">
                <button class="w-100 btn btn-outline-success btnCrearSuscription" type="submit">Crear</button>
            </div>
        </form>
    </div>
    <div class="col-6" id="rptaSuscription">
        <div id="spinner" class="spinner-border text-danger " role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>


    <script>
        document.getElementById("createSuscription").addEventListener("submit", (e) => {
            e.preventDefault();
            const amount = document.getElementById("amount").value;
            const idTransaccion = document.getElementById("transaccionId").value;
            const dateSuscription = document.getElementById("dateSuscription").value;
            const timeSuscription = document.getElementById("timeSuscription").value;
            const initialAmount = document.getElementById("initialAmount").value;
            const initialAmountNumber = document.getElementById("initialAmountNumber").value;
            const paymentMethodToken = document.getElementById("paymentMethodToken").value;
            const rrule = document.getElementById("rrule").value;
            const spinner = document.getElementById("spinner");

            spinner.style.display = "block";

            const data = {
                amount,
                effectDate: `${dateSuscription}T${timeSuscription}:00-05:00`,
                initialAmount,
                initialAmountNumber,
                paymentMethodToken,
                rrule
            }

            const headers = {
                method: "POST",
                body: JSON.stringify(data),
                headers: {
                    "Content-type": "application/json",
                },
            };
            console.log(paymentMethodToken,idTransaccion);
            fetch("http://localhost/000webhost/proyecto-izipay/api/createSuscription.php", headers)
                .then(res => {
                    if (!res.ok) {
                        throw new Error('Hubo un error en la respuesta');
                    }
                    return res.json()
                })
                .then(suscrip => {
                    let formData = new FormData();
                    formData.append("suscriptionId", suscrip.suscriptionId);
                    formData.append("transaccionId", idTransaccion);
                    console.log(formData);

                    fetch("http://localhost/000webhost/proyecto-izipay/front-php/ajax/SuscricionAjax.php", {
                        method: "POST",
                        body: formData
                    })
                    .then(rpta => {
                        console.log(rpta);
                        if(!rpta.ok){
                            throw new Error('Hubo un error en la respuesta Ajax');
                        }
                        return rpta.json();
                    })
                    .then(res=>{
                        console.log("Respuesta: ",res);
                    })

                })
                .catch(error => console.log(error))
        });
    </script>
</section>