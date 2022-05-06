<?php include "modules/header.php"; ?>
<section class="home">
    <h1 style="text-align: center;">Pasarela de pago</h1>
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
        <button type="submit">Continuar</button>
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
    <div id="form-izipay" style="margin: 0 auto; text-align:center; width: 270px;"></div>
    <hr style="margin-top:10px;width: 25%;">
</section>
<script type="text/javascript">
    document.getElementById("form").addEventListener("submit", (e) => {
        e.preventDefault();
        const loading = document.getElementById("loading");
        const correo = document.getElementById("correo").value;
        const monto = document.getElementById("monto").value;
        const formAction = document.getElementById("formAction").value;
        loading.style.display = "block";
        const headers = {
            method: "POST",
            body: JSON.stringify({
                email: correo,
                amount: monto,
                formAction
            }),
            headers: {
                "Content-type": "application/json"
            }
        }
        fetch("http://localhost/izipay/api/CreatePayment.php", headers)
            .then(res => res.json())
            .then(res => {
                console.log(res);
                loading.style.display = "none";
                const form = document.getElementById("form-izipay");
                KR.setFormConfig({
                        /* set the minimal configuration */
                        'kr-public-key': "44842422:testpublickey_Az8ibtrm5cAhb3aOt1g20oQtgpR14c9TSdPYSVhqFlj2P",
                        'kr-post-url-success': 'pago.php',
                        formToken: res.formToken,
                        'kr-language': 'es-ES',
                        /* to update initialization parameter */
                    })
                    .then(({
                            KR
                        }) =>
                        KR.addForm("#form-izipay")
                    ) /* add a payment form  to myPaymentForm div*/
                    .then(({
                            KR,
                            result
                        }) =>
                        KR.showForm(result.formId)
                    );
            })
            .catch(err => console.log("Error: ", err))
    });
</script>


<?php include "modules/footer.php"; ?>