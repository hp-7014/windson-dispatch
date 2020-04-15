<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pricing Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style type="text/css">
        .container { margin-top: 100px; }
        .card { width: 300px; }
        .card:hover {
            -webkit-transform: scale(1.05);
            -moz-transform: scale(1.05);
            -ms-transform: scale(1.05);
            -o-transform: scale(1.05);
            transform: scale(1.05);
            -webkit-transition: all .3s ease-in-out;
            -moz-transition: all .3s ease-in-out;
            -ms-transition: all .3s ease-in-out;
            -o-transition: all .3s ease-in-out;
            transition: all .3s ease-in-out;
        }
        .price { font-size: 72px }
        .currency {
            font-size: 25px;
            position: relative;
            top: -30px;
        }
        .list-group-item {
            border: 0px;
            padding: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h2 class="price"><span class="currency">$</span>27</h2>
                    </div>
                    <div class="card-body">
                        <h1 class="text-center">Product 1</h1>
                        <ul class="list-group">
                            <li class="list-group-item">Feature 1</li>
                            <li class="list-group-item">Feature 2</li>
                            <li class="list-group-item">Feature 3</li>
                        </ul>
                    </div>
                    <div class="card-footer text-center">
                        <form action="paymentProcess.php?pid=1" method="POST">
                            <script
                                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                    data-key="pk_test_tmzbM08gNSpRZkxnwgmVPWjc000Y6gWsrm"
                                    data-amount="2700"
                                    data-name="CodingPassiveIncome"
                                    data-description="Widget"
                                    data-image="wds.png"
                                    data-locale="auto"
                                    data-currency="usd">
                            </script>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h2 class="price"><span class="currency">$</span>67</h2>
                    </div>
                    <div class="card-body">
                        <h1 class="text-center">Product 1</h1>
                        <ul class="list-group">
                            <li class="list-group-item">Feature 1</li>
                            <li class="list-group-item">Feature 2</li>
                            <li class="list-group-item">Feature 3</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <form action="paymentProcess.php?pid=2" method="POST">
                            <script
                                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                    data-key="pk_test_tmzbM08gNSpRZkxnwgmVPWjc000Y6gWsrm"
                                    data-amount="6700"
                                    data-name="CodingPassiveIncome"
                                    data-description="Widget"
                                    data-image="wds.png"
                                    data-locale="auto"
                                    data-currency="usd">
                            </script>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h2 class="price"><span class="currency">$</span>97</h2>
                    </div>
                    <div class="card-body">
                        <h1 class="text-center">Product 1</h1>
                        <ul class="list-group">
                            <li class="list-group-item">Feature 1</li>
                            <li class="list-group-item">Feature 2</li>
                            <li class="list-group-item">Feature 3</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <form action="paymentProcess.php?pid=3" method="POST">
                            <script
                                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                    data-key="pk_test_tmzbM08gNSpRZkxnwgmVPWjc000Y6gWsrm"
                                    data-amount="9700"
                                    data-name="CodingPassiveIncome"
                                    data-description="Widget"
                                    data-image="wds.png"
                                    data-locale="auto"
                                    data-currency="usd">
                            </script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>