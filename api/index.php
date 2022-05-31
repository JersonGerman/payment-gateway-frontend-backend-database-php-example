<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apis PHP</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <style>
        
        .card-code{
            background-color: #e9ecef;
            background-clip: border-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            padding: 0.375rem 0.75rem;
        }
        pre{
            height: auto;
            margin: 0;
        }
        span{
            font-size: 14px;
        }
    </style>
</head>
<body>
    <section class="container mt-5">
        <a href="../front-php/" class="link-success float-start">Ir a Front</a>
        <h2 class="text-center mb-5">API IZIPAY PHP</h2>
        <div>
            <h4 class="mb-4"><span class="badge bg-danger me-2">POST</span>Create Payment</h4>
            <span>HEADER</span>
            <hr class="my-2">
            <input class="form-control mb-4" value="http://localhost/proyecto-izipay/api/CreatePayment" disabled readonly></input>
            <span>BODY</span>
            <hr class="my-2">
            <div class="card-code">
                <pre>    {
        "amount": 1000,
        "currency": "PEN",
        "email": "example@gmail.com",
        "formAction": ""
    }</pre>
                
                    
                
            
                  
            </div>

        </div>

    </section>

</body>
</html>