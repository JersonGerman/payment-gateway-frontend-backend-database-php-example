<?php
require_once "modules/header.php";
require_once "controller/IzipayController.php";
?>


<section class="container pt-4 list-pay">
    <h2 class="mb-4 text-center">Pagos realizados</h2>
    <table class="table table-hover table-sm">
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
                if($key["token"]){

                    echo "<tr>
                        <td style='color:red;text-align:center;'>No</td>    
                        <td>" . $key['id_transaction'] . "</td>    
                        <td>" . $key['order_Id'] . "</td>    
                        <td>" . $key['email'] . "</td>    
                        <td>$ " . $key['amount'] . ".00</td>    
                        <td>" . $key['card'] . "</td>    
                        <td>" . $key['pan'] . "</td>    
                        <td>" . $key['fechaCreacion'] . "</td>    
                        <td class='text-center'>" . substr($key['token'],0,-20) . ".....</td>    
                        <td>" . $key['uuid'] . "</td>    
                        <td>
                            <li class='btn-group'>
                                <a type='button' class='nav-link dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'>
                                    Action
                                </a>
                                <ul class='dropdown-menu'>
                                    <li><a class='dropdown-item' href='createSuscription.php?token=".$key['token']."&id=".$key["id"]."'>Create Suscription</a></li>
                                    <li><a class='dropdown-item' href='#'>Get Suscription</a></li>
                                    <li><a class='dropdown-item' href='#'>Update Suscription</a></li>
                                    <li><a class='dropdown-item' href='#'>Cancel Suscription</a></li>
                                </ul>
                            </li>
                        </td>   
                    </tr>";
                }
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