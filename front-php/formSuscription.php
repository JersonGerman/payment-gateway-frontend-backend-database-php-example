<?php include "modules/header.php"; ?>

<section class="home">
    <h2 style="text-align: center;">Formulario de sucripcion</h2>
    <form id="form" style="display:block; margin:1rem auto; text-align:center">
        <div>
            <label for="correo">Ingrese su correo:</label>
            <input type="email" id="correo" required>
        </div>
        <div style="margin:1rem 0;">
            <label for="moneda">Moneda:</label>
            <!-- <input type="text" id="moneda" value="USD" disabled > -->
            <select id="moneda" required>
                <option value="PEN">PEN</option>
                <option value="USD">USD</option>
            </select>
        </div>
        <button class="btn btn-outline-success" type="submit">Continuar</button>
    </form>

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
            <div class="kr-pan"></div>
            <div class="kr-expiry"></div>
            <div class="kr-security-code"></div>
            <!-- <span>Número de cuotas</span> -->
            <!-- payment form submit button -->
            <!-- <div style="display: none;"> -->
            <button class="kr-payment-button" ></button>
            <!-- </div> -->
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


<script type="text/javascript" src="./js/scriptToken.js">
  
</script>


<?php include "modules/footer.php"; ?>