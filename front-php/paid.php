<?php

/**
 * Payment done landing page example
 * 
 * To run the example, go to 
 * hhttps://github.com/lyra/rest-php-example
 */

/**
 * I initialize the PHP SDK
 */
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/helpers.php';


/** 
 * Initialize the SDK 
 * see keys.php
 */
$client = new Lyra\Client();
$client->setUsername("44842422");
$client->setPassword("testpassword_GYlAyCPpf2qQCDRGWjxv0qJDqW6F064GY7TmdBefPZEiz");
$client->setSHA256Key("ZjbNRAlxT6FCG1UITWqr6gg9ukABNMoKozihudREXvIOI");
/* No POST data ? paid page in not called after a payment form */
if (empty($_POST)) {
    throw new Exception("no post data received!");
}

/* Utilice el asistente del SDK del cliente para recuperar los parámetros POST */
$formAnswer = $client->getParsedFormAnswer();

?>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.3.0/styles/dracula.min.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="skinned/assets/paid.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.3.0/highlight.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('pre code').each(function(i, block) {
                hljs.highlightBlock(block);
            });
        });
    </script>
</head>

<body>


    <div class="container">
        <h2>Raw POST data received:</h2>
        <pre><code class="json"><?php print json_encode($_POST, JSON_PRETTY_PRINT) ?></code></pre>

        <h2>Parsed POST data:</h2>
        <pre><code class="json"><?php print json_encode($formAnswer, JSON_PRETTY_PRINT) ?></code></pre>
    </div>

    <?php
    /*Comprobar la firma */
    /*if (!$client->checkHash()) {
        //algo mal, probablemente un fraude ...
        signature_error(
            $formAnswer['kr-answer']['transactions'][0]['uuid'],
            $client->getSHA256Key(),
            $client->getLastCalculatedHash(),
            $_POST['kr-hash']
        );
        throw new Exception("invalid signature");
    }*/

    /*Verifico si realmente está pagado*/
    /*if ($formAnswer['kr-answer']['orderStatus'] != 'PAID') {
        $title = "Transacciónn no pagada !";
    } else {
        $title = "Transacción pagada !";
        $formAnswer = $formAnswer['kr-answer'];
        $transaction = $formAnswer['transactions'][0];

        $registro = array(
            "orderStatus" => $formAnswer['orderStatus'],
            "orderId" => $formAnswer['orderDetails']['orderId'],
            "email" => $formAnswer['customer']['email'],
            "idTransaction" => $transaction['transactionDetails']['cardDetails']['legacyTransId'],
            "uuid" => $transaction['uuid'],
            "amount" => $transaction['amount'],
            "fechaCreacion" => $transaction['creationDate'],
            "token" => $transaction['paymentMethodToken'],
            "card" => $transaction['transactionDetails']['cardDetails']['effectiveBrand']
        );

        // saveTransaction($registro);

    }*/
    echo "<hr>";
    date_default_timezone_set("America/Lima");
    ?>

    <h1><?php echo date("Y-m-d:H:i:s"); ?></h1>
    <h1><a href="index.php">Back to demo menu</a></h1>

</body>

</html>