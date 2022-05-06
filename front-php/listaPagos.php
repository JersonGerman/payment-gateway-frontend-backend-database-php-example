<?php
require_once "modules/header.php";
require_once "controller/IzipayController.php";
?>


<section class="list-pay">
    <h1 style="text-align: center;">Pagos realizados</h1>
    <table>
        <thead>
            <tr>
                <th>Suscrito</th>
                <th>N° Transaccion</th>
                <th>Referencia de pedido</th>
                <th>Email</th>
                <th>Amount</th>
                <th>Card</th>
                <th>Pan</th>
                <th>Fecha de pago</th>
                <th>Token</th>
                <th>Uuid</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $objIzi = new IzipayController();
            $lista = $objIzi->getAllPays();
            foreach ($lista as $key) {
                // print_r($key);
                echo "<tr>
                    <td style='color:red;'>No</td>    
                    <td>" . $key['id_transaction'] . "</td>    
                    <td>" . $key['order_Id'] . "</td>    
                    <td>" . $key['email'] . "</td>    
                    <td>$ " . $key['amount'] . ".00</td>    
                    <td>" . $key['card'] . "</td>    
                    <td>" . $key['pan'] . "</td>    
                    <td>" . $key['fechaCreacion'] . "</td>    
                    <td>" . $key['token'] . "</td>    
                    <td>" . $key['uuid'] . "</td>    
                    <td>
                        <a href='createSuscription'><button>Create Suscription</button></a>
                        <a href='getSuscription'><button>Get Suscription</button></a>
                        <a href='#'><button>Update Suscription</button></a>
                        <a href='#'><button>Cancel Suscription</button></a>
                    </td>   
                </tr>";
                // print_r($value);
            }
            ?>
            <!-- <tr>
                <td>N°</td>
                <td>N° Transaccion</td>
                <td>Referencia de pedido</td>
                <td>Email</td>
                <td>Amount</td>
                <td>Card</td>
                <td>Pan</td>
                <td>Email</td>
                <td>Token</td>
                <td>Uuid</td>
            </tr> -->

        </tbody>
    </table>
    <?php
    // print_r($lista);
    ?>

</section>



<?php include "modules/footer.php"; ?>