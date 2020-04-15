<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thank You</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style type="text/css">
        .container { margin-top: 100px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Thank You For Purchase!!!</h2>
                <p>
                    <?php
                        if ($_GET['e'] == 1) {
                    ?>
                        Your login details are included below:<br>
                            <b>username</b>: <?php echo $_GET['ue'] ?><br>
                            <b>password</b>: <?php echo $_GET['p'] ?><br><br>

                            <a href=''>Click Here To Login</a><br><br>
                    <?php
                        } else
                            echo 'Please Check Your Inbox/SPAM folder!';
                    ?>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
