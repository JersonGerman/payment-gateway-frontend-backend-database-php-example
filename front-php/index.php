<?php include "modules/header.php"; ?>
<section class="home">
    <h2 style="text-align: center;">Pasarela de pago</h2>
    <form id="form" style="display:block; margin:1rem auto; text-align:center">
        <div>
            <label for="correo">Ingrese su correo:</label>
            <input type="email" id="correo" required>
        </div>
        <div style="margin:1rem 0;">
            <label for="monto">Ingrese un monto:</label>
            <input type="number" id="monto" required>
        </div>
        <div style="margin: 1rem 0;">
            <label for="formAction">formAction:</label>
            <select type="select" id="formAction" name="formAction" required>
                <option value="">Seleccionar</option>
                <option value="ASK_REGISTER_PAY">Ask register pay</option>
                <option value="PAYMENT">Payment</option>
                <option value="REGISTER_PAY">Register Pay</option>
                <option value="SILENT">Silent</option>
                <option value="CUSTOMER_WALLET">Customer Wallet</option>
            </select>
        </div>
        <button class="btn btn-outline-success" type="submit">Continuar</button>
    </form>
    <!-- <a href="https://secure.micuentaweb.pe/vads-site/IZI_JERSON_GERMAN_TAIPE_MIRAND?ctx_mode=TEST&lck_vads_amount=200"> Pagar </a> -->
    <hr style="width: 25%;">
    <div id="loading" style="display: none; text-align:center;">
        <div class="lds-facebook">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <div id="form-izipay" style="margin: 0 auto; text-align:center; width: 270px;display: none;" >
        <div id="izi" class="kr-embedded" >
            <!-- payment form fields -->
            <!-- <span>Ingresa los datos de tu tarjeta</span> -->
            <div class="kr-pan"></div>
            <!-- <span>Fecha de vencimiento</span> -->
            <div class="kr-expiry"></div>
            <!-- <span>Código de seguridad</span> -->
            <div class="kr-security-code"></div>
            <!-- <span>Número de cuotas</span> -->
            <!-- payment form submit button -->
            <div style="display: none;">
                <button class="kr-payment-button"></button>
            </div>

            <!-- error zone -->
            <div class="kr-form-error"></div>
        </div>
        <div id="spinner" class="spinner-border text-danger " role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <div id="contentButton" class="contentButton">
        <button type="button" class="customButton" id="customButton">
            Pagar
        </button>
    </div>
    <hr style="margin-top:10px;width: 25%;">
</section>


<script type="text/javascript" src="./js/script.js"></script>


<?php include "modules/footer.php"; ?>