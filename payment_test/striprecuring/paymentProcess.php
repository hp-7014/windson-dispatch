 <?php
    use PHPMailer\PHPMailer\PHPMailer;

    $products = array(
        "pids" => ["1", "2", "3"],
        "1" => "plan_Go1zKbpCHr7Z17",
        "2" => "plan_Go382DC9Nc8tf9",
        "3" => "plan_Go3B3syCzWbVSS"
    );

    if (!isset($_GET['pid']) || !in_array($_GET['pid'], $products['pids']) || !isset($_POST['stripeToken']) || !isset($_POST['stripeEmail'])) {
        header('Location: index.php');
        exit();
    }

    require_once('stripe-php-6.24.0/init.php');

    $stripe = [
        "secret_key"      => "sk_test_A3eyrP2CFFywD0NGlUNpqa5Z00EMsWdRiH",
        "publishable_key" => "pk_test_tmzbM08gNSpRZkxnwgmVPWjc000Y6gWsrm",
    ];

    \Stripe\Stripe::setApiKey($stripe['secret_key']);

    $pid = $_GET['pid'];
    $token  = $_POST['stripeToken'];
    $email  = $_POST['stripeEmail'];

    $customer = \Stripe\Customer::create([
        'email' => $email,
        'source'  => $token,
    ]);

    \Stripe\Subscription::create([
        "customer" => $customer->id,
        "items" => [
            [
                "plan" => $products[$pid],
            ],
        ]
    ]);

    //Store Data Into Database
    $conn = new mysqli("localhost", "root", "", "stripeRecurring");
    $email = $conn->real_escape_string($email);
    $password = "qwertzuioplkjhgfdsayxcvbnm1234567890";
    $password = str_shuffle($password);
    $password = strtoupper(substr($password, 0, 10));
    $ePassword = password_hash($password, PASSWORD_BCRYPT);

    $conn->query("INSERT INTO users (email, plan, password, regDate) VALUES ('$email', '$pid', '$ePassword', NOW())");

    //Send Mail Using PHP Mailer
    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();
    $mail->Host = "smtp.gmail.com";
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Username = "parmarchetan726@gmail.com";
    $mail->Password = 'cpios9pro';
    $mail->Port = 465; //587
    $mail->SMTPSecure = "ssl";//tls
    $mail->addAddress($email);
    $mail->setFrom("parmarchetan726@gmail.com", "Chetan CP");
    $mail->isHTML(true);
    $mail->Subject = "Your Login Details...";
    $mail->Body = "
        Hey,
        <br><br>
        Thank you for the purchase. Your login details are included below:<br><br>
        <b>username</b>: $email<br>
        <b>password</b>: $password<br><br>
        
        <a href=''>Click Here To Login</a><br><br>
        
        Thanks,<br>
        Senaid B.
    ";

    if ($mail->send())
        $error = 0;
    else
        $error = 1;

    header('Location: thank-you.php?ue='.$email.'&e='.$error.'&p='.$password.'&pid='.$pid);
?>